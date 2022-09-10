<?php

namespace app\Router;

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

    private function handleActionWithController(array $action): array
    {
        if (class_exists($action[0]))
            $controller = new $action[0]();
        return [$controller, $action[1]];
    }

    private function handleAction(array|callable $action): array|callable
    {
        if (is_array($action)) return $this->handleActionWithController($action);
        return $action;
    }

    public function existParams()
    {
        $pattern = '/' . URI_START_PARM . '\w+' . URI_END_PARM . '/';
        return preg_match($pattern, $this->uri);
    }
}
