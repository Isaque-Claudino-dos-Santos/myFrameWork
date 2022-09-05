<?php

namespace app\Router;

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

    private function getRoutesByMethod(Router $router): array
    {
        return $router->getRoutes()[$this->requestMethod];
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
        $routes = $this->getRoutesByMethod($router);
        $routesKeys = array_keys($routes);
        foreach ($routesKeys as $uri) {
            $pattern = str_replace('/', '\/', $uri);
            $pattern = '/^' . $pattern . '$/';
            $isFound =  preg_match_all($pattern, $this->requestUri, $match, PREG_SET_ORDER);
            if ($isFound) {
                $this->route = $routes[$uri];
                $this->setRouteParamsValue($match);

                return;
            }
        }
        dd('not found');
    }

    public function run(Router $router)
    {
        $this->setRouteRequired($router);
        $params = $this->routeParamsValue;
        $controller = new $this->route->action[0]();
        $action = $this->route->action[1];
        call_user_func_array(
            [$controller, $action],
            $params
        );
    }
}
