<?php

$files = ['view', 'dd'];

foreach ($files as $file) {
    require(DIR_HELPERS . $file . '.php');
}
