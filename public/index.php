<?php
require_once('../vendor/autoload.php');

use app\Application\Application;

$application = new Application();

$application->buildRoutes('app/Router/routes.php');
