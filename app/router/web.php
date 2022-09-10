<?php
#---------#
# Routers #
#---------#
use src\Router\Router;
use src\Router\RouteRequest;
#------------#
# Cotrollers #
#------------#


$router = new Router();

$routerRequest = new RouteRequest($router);

$routerRequest->run();  


#  ___  #
#-(•_•)-#
