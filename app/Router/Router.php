<?php

namespace app\Router;

class Router
{
    private Routes $GET;
    private Routes $POST;
    private readonly array $methods;

    public function __construct()
    {
        $this->GET = new Routes('GET');
        $this->POST = new Routes('POST');
        $this->methods = ['GET', 'POST'];
    }

    public function getMethodVerb(string $method): Routes
    {
        $method = strtoupper($method);
        if (!in_array($method, $this->methods))
            throw new \Exception("The method $method passsed not valid");
        return $this->$method;
    }

    private function saveRoute(string $uri, array|callable $action, string $method, string $name = ''): void
    {
        $method = strtoupper($method);
        $route = new Route($uri, $action, $method);
        $route->name = $name;
        $routes = $this->$method;
        $routes->add($route);
    }

    public function get(string $uri, array|callable $action, string $name = ''): void
    {
        $this->saveRoute($uri, $action, 'get', $name);
    }

    public function post(string $uri, array|callable $action, string $name = ''): void
    {
        $this->saveRoute($uri, $action, 'post', $name);
    }
}
