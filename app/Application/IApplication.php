<?php

namespace app\Application;

use app\Router\Router;
use app\Router\RouteRequest;

interface IApplication
{
    public function buildRoutes(string $file): void;
}
