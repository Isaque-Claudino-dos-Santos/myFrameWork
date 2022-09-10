<?php
#---------#
# Routers #
#---------#
use app\Router\Router;
#------------#
# Cotrollers #
#------------#
use app\Controllers\HomeController;
use app\Controllers\UserController;
use app\Router\RouteRequest;

$router = new Router();

$router->get(
    uri: '/',
    action: [HomeController::class, 'index'],
    name: 'home.index'
);


$router->get(
    uri: '/user/{id}',
    action: [UserController::class, 'index'],
    name: 'user.index'
);

$router->get(
    uri: '/user/{id}/contato/{tell}',
    action: [UserController::class, 'index'],
    name: 'user.contato.index'
);

$routerRequest = new RouteRequest($router);

$routerRequest->run();  


#  ___  #
#-(•_•)-#
