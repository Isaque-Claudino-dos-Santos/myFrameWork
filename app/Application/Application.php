<?php

namespace app\Application;


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
