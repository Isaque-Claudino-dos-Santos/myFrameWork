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

$router->get(
    '/',
    function () {
        echo 'Hello Word';
    },
    'home.index'
);


$routerRequest = new RouteRequest($router);
$routerRequest->run();  

#  ___  #
#-(•_•)-#
