<?php

namespace app\Router;

class Route
{
    public $action;

    public function __construct(public string $uri, array|callable $action, public string $method)
    {
        $this->uri = $uri;
        $this->action = $action;
        $this->method = $method;
        $this->tranformParamsInRegex();
    }

    private function tranformParamsInRegex()
    {
        $this->uri = preg_replace(['/{\w+}/', '/{\w+\?}/'], ['(\w+)', '(\w+)?'], $this->uri);
    }
}
