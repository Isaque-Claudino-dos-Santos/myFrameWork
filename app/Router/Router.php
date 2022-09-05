<?php

namespace app\Router;

use app\Router\Route;

class Router
{
    private readonly array $methods;
    private array $routes = [];
    private array $namesUri = [];

    public function __construct()
    {
        $this->methods = ['GET', 'POST'];
        $this->routes = $this->defineKeyWithMethodsInArray();
        $this->namesUri = $this->defineKeyWithMethodsInArray();
    }

    public function getRoutes()
    {
        return $this->routes;
    }

    public function getNamesUri()
    {
        return $this->namesUri;
    }

    private function defineKeyWithMethodsInArray(): array
    {
        return array_fill_keys($this->methods, []);
    }

    private function methodRouteIsValid(Route $route): bool
    {
        return in_array($route->method, $this->methods);
    }

    private function uriRouteAlreadyUsed(Route $route): bool
    {
        $routes = $this->routes[$route->method];
        return array_key_exists($route->uri, $routes);
    }

    private function nameUriAlreadyUsed(Route $route, string $name): bool
    {
        $names = $this->namesUri[$route->method];
        return array_key_exists($name, $names);
    }

    private function validateRoute(Route $route, string $name): bool
    {
        if (!$this->methodRouteIsValid($route))
            throw new \Exception('The method ' . $route->method . ' passed in route not valid');
        if ($this->uriRouteAlreadyUsed($route))
            throw new \Exception('The uri ' . $route->uri . ' passed in route already defined');
        if ($this->nameUriAlreadyUsed($route, $name))
            throw new \Exception('The name uri ' . $name . ' passed alread used');
        return true;
    }

    private function defineRoute(Route $route, string $name): void
    {
        $this->routes[$route->method][$route->uri] = $route;
        $this->namesUri[$route->method][$name] = $route->uri;
    }

    public function save(Route $route, string $name = ''): void
    {
        if ($this->validateRoute($route, $name))
            $this->defineRoute($route, $name);
    }
}
