<?php

use app\Controllers\HomeController;
use src\Router\Router;


$router = new Router();

$router->get('/', [HomeController::class, 'index'], 'home.index');

return $router;
#  ___  #
#-(•_•)-#
