<?php

namespace src\Router;

use src\Http\Request;

class RouteRequest
{
    private string $requestUri;
    private string $requestMethod;

    public function __construct(private Router $router)
    {
        $this->router = $router;
        $this->requestUri = $_SERVER['REQUEST_URI'];
        $this->requestMethod = $_SERVER['REQUEST_METHOD'];
    }

    private function tranformUriParamsInRegex($uri)
    {
        $patternValueRequired = '/' . URI_START_PARM . '\w+' . URI_END_PARM . '/';
        $patternValueOpitional = '/' . URI_START_PARM . '\w+\?' . URI_END_PARM . '/';
        $replaceValueRequired = '(\w+)';
        $replaceValueOptional = $patternValueRequired . '?';
        return preg_replace(
            [$patternValueRequired, $patternValueOpitional],
            [$replaceValueRequired, $replaceValueOptional],
            $uri
        );
    }

    private function regexScapeBar(string $pattern)
    {
        return str_replace('/', '\/', $pattern);
    }


    private function handleUriRequired(array $routes)
    {
        foreach ($routes as $uri => $route) {
            $uriWithPattern = $this->tranformUriParamsInRegex($uri);
            $uriWithPattern = $this->regexScapeBar($uriWithPattern);
            $routeFound =  preg_match_all('/^' . $uriWithPattern . '$/', $this->requestUri, $match, PREG_SET_ORDER);
            if ($routeFound) {
                return [
                    'uri' => $uri,
                    'postRequest' => new Request($_POST),
                    'getRequest' => array_slice($match[0], 1),
                ];
            }
        }
    }

    private function handleParams(array $params): array
    {
        $post = $params['postRequest'];
        $get = $params['getRequest'];

        if (empty($post)) return $get;
        return [$post, ...$get];
    }

    public function run()
    {
        $methoVerb = $this->router->getMethodVerb($this->requestMethod);
        $routes = $methoVerb->getRoutes();
        $require = $this->handleUriRequired($routes) ?? throw new \Exception('Erro 404 not found', 404);
        $route = $methoVerb->findRoute($require['uri']);
        $params = $this->handleParams($require);
        call_user_func_array($route->action, $params);
    }
}
