<?php
#---------#
# Routers #
#---------#

use app\Controllers\UserController;
use src\Router\Router;
use src\Router\RouteRequest;
#------------#
# Cotrollers #
#------------#
require_once('../src/helpers/dd.php');

$router = new Router();

$router->get('/', function () {
    echo "
    <a href='/user'>User Index</a> <br>
    <a href='/user/test'>User Test</a> <br>
    ";
}, 'home.index');

$router->get('/user', [UserController::class, 'index'], 'user.index');

$router->get('/user/{name?}/idade/{ages?}', [UserController::class, 'test'], 'user.test');


$routerRequest = new RouteRequest($router);
$routerRequest->run();  

#  ___  #
#-(•_•)-#
