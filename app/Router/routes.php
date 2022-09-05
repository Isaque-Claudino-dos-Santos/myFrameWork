<?php
#---------#
# Routers #
#---------#
use app\Router\Router;
use app\Router\Route;
#------------#
# Cotrollers #
#------------#
use app\Controllers\HomeController;
use app\Controllers\UserController;
use app\Router\RouteRequest;

$router = new Router();

$router->save(
    route: new Route('/', [HomeController::class, 'index'], 'GET'),
    name: 'home.index'
);

$router->save(
    route: new Route('/user', [UserController::class, 'index'], 'GET'),
    name: 'user.index'
);

$router->save(
    route: new Route('/user/{id}', [UserController::class, 'show'], 'GET'),
    name: 'user.show'
);

$router->save(
    route: new Route('/user/{id}/contato/{telefone?}', [UserController::class, 'show'], 'GET'),
    name: 'user.contato.show'
);


$routeRequest = new RouteRequest();
$routeRequest->run($router);
