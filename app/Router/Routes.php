<?php

namespace app\Router;

class Routes
{
    private array $routes = [];

    public function __construct(private readonly string $type)
    {
        $this->type = $type;
    }

    private function existeKeyInRoutes(string $uri): bool
    {
        return array_key_exists($uri, $this->routes);
    }

    public function add(Route $route): void
    {
        $this->routes[$route->uri] = $route;
    }

    public function find(string $uri): Route
    {
        if (!$this->existeKeyInRoutes($uri))
            throw new \Exception('The uri(' . $uri . ') not exist found in routes');
        return $this->routes[$uri];
    }
}
