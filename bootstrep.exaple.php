<?php

//DIR(DIRECTORY) CONSTANTS
define('DIR_ROOT', dirname(__FILE__));
define('DIR_VIEW', DIR_ROOT . '/app/views/');
define('DIR_HELPERS', DIR_ROOT . '/app/helpers/');
//SERVER
define('SERVER_HOST', 'localhost');
define('SERVER_PORT', 2022);

//DB(DATA-BASE)
define('DB_HOST', '');
define('DB_PORT', 3306);
define('DB_NAME', 'test');
define('DB_USER', 'root');
define('DB_PASS', 'root');

//Router URI
define('URI_START_PARM', '{');
define('URI_END_PARM', '}');

//ENVIRONMENT(DEV ENVIRONMENT)

define('ENVIRONMENT_DBUG', true);

if (ENVIRONMENT_DBUG) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}
