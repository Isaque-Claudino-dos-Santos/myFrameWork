<?php
#---------#
# Routers #
#---------#
use src\Router\Router;
use src\Router\RouteRequest;
#------------#
# Cotrollers #
#------------#
use app\Controllers\HomeController;
use app\Controllers\UserController;

$router = new Router();

$routerRequest = new RouteRequest($router);

$routerRequest->run();  


#  ___  #
#-(•_•)-#
