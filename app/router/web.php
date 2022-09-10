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

$router->get(
    uri: '/',
    action: [HomeController::class, 'index'],
    name: 'home.index'
);


$router->get(
    uri: '/user/{id}',
    action: [UserController::class, 'show'],
    name: 'user.show'
);

$router->post(
    uri: '/user/{id}',
    action: [UserController::class, 'store'],
    name: 'user.store'
);

$routerRequest = new RouteRequest($router);

$routerRequest->run();  


#  ___  #
#-(•_•)-#
