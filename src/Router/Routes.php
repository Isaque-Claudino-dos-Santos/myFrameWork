<?php

namespace src\Router;

class Routes
{
    private array $routes = [];
    public readonly string $method;
    private array $routeNames = [];

    public function __construct(string $method)
    {
        $this->method = $method;
    }

    public function getRoutes(): array
    {
        return $this->routes;
    }

    public function existRoutes(): bool
    {
        return !empty($this->routes);
    }

    public function getRouteNames(string $name): string
    {
        return $this->routeNames[$name];
    }

    private function setRouteNames(string $uri, string $name)
    {
        $this->routeNames[$name] = $uri;
    }

    private function uriExistInRoutes(string $uri): bool
    {
        return array_key_exists($uri, $this->routes);
    }

    private function nameExistInRouteNames(string $name): bool
    {
        return array_search($name, $this->routeNames);
    }

    private function validateRoute(Route $route): void
    {
        if ($this->uriExistInRoutes($route->uri))
            throw new \Exception('The uri( ' . $route->uri . ' ) passed in route ' . $this->method . ' already defined');

        if ($this->nameExistInRouteNames($route->name))
            throw new \Exception('The name( ' . $route->name . ' ) passed in route(' . $this->method . ' ' . $route->uri . ') already defined');
    }

    public function add(Route $route): void
    {
        $this->validateRoute($route);
        $this->setRouteNames($route->uri, $route->name);
        $this->routes[$route->uri] = $route;
    }

    public function findRoute(string $uri): Route
    {
        if (!$this->uriExistInRoutes($uri))
            throw new \Exception('The uri(' . $uri . ') not found in routes');
        return $this->routes[$uri];
    }
}
