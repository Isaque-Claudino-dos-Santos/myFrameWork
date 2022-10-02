<?php

namespace app\Application;

use src\Router\Router;
use src\Router\RouteRequest;

class Application
{
    private $routeResponse;

    public function routerWeb($filePath): Router
    {
        return require_once(DIR_ROOT . "/$filePath.php");
    }

    public function routerRun(Router $router): void
    {
        $routerRequest = new RouteRequest($router);
        $this->routeResponse = $routerRequest->run();
    }

    public function buildRouteResponse()
    {
        echo $this->routeResponse;
    }
}
