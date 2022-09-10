<?php

namespace src\Router;

use Exception;

class Route
{
    public $action;
    public string $name = '';

    public function __construct(public string $uri, array|callable $action, public string $method)
    {
        $this->uri = $uri;
        $this->action = $this->handleAction($action);
        $this->method = $method;
    }

    private function existNameSpace(string $namespace): string
    {
        if (!class_exists($namespace))
            throw new Exception("The class controller passed in route <br> uri: {$this->uri} <br> method: {$this->method} <br> not exist");
        return $namespace;
    }

    private function existMethodInClass(object $class, string $methodName): array
    {
        if (!method_exists($class, $methodName))
            throw new Exception("The method $methodName in class $class not exist");

        return  [$class, $methodName];
    }

    private function handleActionWithController(array $action): array
    {
        $namespace = $this->existNameSpace($action[0]);
        $controller = new $namespace();
        return $this->existMethodInClass($controller, $action[1]);
    }

    private function handleAction(array|callable $action): array|callable
    {
        if (is_array($action)) return $this->handleActionWithController($action);
        return $action;
    }
}
