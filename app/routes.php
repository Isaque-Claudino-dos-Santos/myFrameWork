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
