<?php
#---------#
# Routers #
#---------#
use src\Router\Router;
use src\Router\RouteRequest;
#------------#
# Cotrollers #
#------------#
use app\Controllers\UserController;

require_once('../src/helpers/dd.php');

$router = new Router();

$router->get(
    uri: '/',
    action: function () {
        return 'Hello Word !!';
    },
    name: 'home.index'
);

return $router;
#  ___  #
#-(•_•)-#
