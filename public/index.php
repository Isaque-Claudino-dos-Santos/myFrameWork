<?php

use app\Application\Application;

require_once('../vendor/autoload.php');


$application = new Application();

$router = $application->routerWeb('app/router/web');
$application->routerRun($router);

$application->buildRouteResponse();
