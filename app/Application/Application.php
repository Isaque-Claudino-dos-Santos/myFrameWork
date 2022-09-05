<?php

namespace app\Application;

use app\Router\Router;
use app\Router\RouteRequest;

class Application implements IApplication
{
    public function buildRoutes(string $file): void
    {
        try {
            require_once(DIR_ROOT . '/' . $file);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
