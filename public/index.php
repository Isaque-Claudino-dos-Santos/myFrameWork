<?php
require_once('../vendor/autoload.php');

try {
    require_once('../app/routes.php');
} catch (Exception $e) {
    echo $e->getMessage();
}
