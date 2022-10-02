<?php

namespace src\Handlers;

use app\Kernel;

class ComandsHandler extends Kernel
{
    private MigrationsHandler $migrationHandler;
    public function __construct()
    {
        $this->migrationHandler = new MigrationsHandler();
    }

    private function migration_up(string $migrationName = '')
    {
        if (empty($migrationName)) {
            foreach ($this->migrations as $migration) {
                $this->migrationHandler->tableUp(new $migration());
            }
            return;
        }
        $namespace = $this->namespaces['migrations'] . $migrationName;
        $migration = new $namespace();
        $this->migrationHandler->tableUp($migration);
    }

    private function migration_down(string $migrationName = ''): void
    {
        if (empty($migrationName)) {
            foreach ($this->migrations as $migrateon) {
                $this->migrationHandler->tableDown(new $migrateon());
            }
            return;
        }
        $namespace = $this->namespaces['migrations'] . $migrationName;
        $migration = new $namespace();
        $this->migrationHandler->tableDown($migration);
    }

    public function call(string $comand, string $argument): void
    {
        if (empty($comand)) {
            $comands = array_diff(get_class_methods($this), ['__construct', 'call']);
            echo "---------------------------\n";
            echo "----------COMANDS----------\n";
            echo "---------------------------\n";
            foreach ($comands as $comand) {
                echo "\n---------------------------\n -> " . $comand . "\n" . "---------------------------\n";
            }
            return;
        };
        $this->$comand($argument);
    }
}
