<?php
#---------#
# Routers #
#---------#


use src\Router\Router;
use src\Router\RouteRequest;
#------------#
# Cotrollers #
#------------#
require_once('../src/helpers/dd.php');

use src\DataBase\DB;

$DB = new DB();


$router = new Router();

$router->get('/', function () {
    global $DB;
}, 'home.index');

$routerRequest = new RouteRequest($router);

$routerRequest->run();  


#  ___  #
#-(•_•)-#
