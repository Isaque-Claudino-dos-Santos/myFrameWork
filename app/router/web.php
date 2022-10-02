<?php
#---------#
# Routers #
#---------#

use app\Controllers\HomeController;
use src\Router\Router;
use src\Router\RouteRequest;
#------------#
# Cotrollers #
#------------#


require_once('../src/helpers/dd.php');

$router = new Router();

$router->get('/', [HomeController::class, 'index'], 'home.index');

return $router;
#  ___  #
#-(•_•)-#
