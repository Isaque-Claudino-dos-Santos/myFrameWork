<?php

declare(strict_types=1);

require_once('../vendor/autoload.php');

try {
    require_once('../app/router/web.php');
} catch (Exception $e) {
    echo $e->getMessage();
}
