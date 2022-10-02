<?php

namespace app;

abstract class Kernel
{
    protected array $namespaces = [
        'migrations' => 'app\Migrations\\'
    ];

    protected array $migrations = [
        'app\Migrations\UserMigration'
    ];
}
