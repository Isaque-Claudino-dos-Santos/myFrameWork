<?php

namespace app\Router;

use Exception;

class RouteRequest
{
    private string $requestUri;
    private string $requestMethod;
    private Route $route;
    private array $routeParamsValue;

    public function __construct()
    {
        $this->requestUri = $_SERVER['REQUEST_URI'];
        $this->requestMethod = $_SERVER['REQUEST_METHOD'];
    }

    private function tranformUriParamsInRegex($uri)
    {
        $pattern = '/{\w+}/';
        $patternOpitional = '/' . URI_START_PARM . '\w+\?' . URI_END_PARM . '/';
        return preg_replace([$pattern, $patternOpitional], ['(\w+)', '(\w+)?'], $uri);
    }

    private function setRouteParamsValue(array $ary): void
    {
        unset($ary[0][0]);
        $params = $ary[0];
        array_push($params, '');
        $this->routeParamsValue = $params;
    }

    private function setRouteRequired(Router $router)
    {
        $routes = $router->getRoutes($this->requestMethod);
        $routesKeys = array_keys($routes);
        foreach ($routesKeys as $uri) {
            $defaultUri = $uri;
            $uri = $this->tranformUriParamsInRegex($defaultUri);
            $pattern = str_replace('/', '\/', $uri);
            $routeIsFound =  preg_match_all('/^' . $pattern . '$/', $this->requestUri, $match, PREG_SET_ORDER);
            if ($routeIsFound) {
                $this->route = $routes[$defaultUri];
                $this->setRouteParamsValue($match);
                return;
            }
        }
        throw new Exception('NOT FOUND', 404);
    }

    public function run(Router $router)
    {
        $this->setRouteRequired($router);
        $params = $this->routeParamsValue;
        $action = $this->route->action;
        call_user_func_array($action, $params);
    }
}
