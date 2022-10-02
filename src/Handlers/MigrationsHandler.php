<?php

namespace src\Handlers;

use src\DataBase\DB;
use src\DataBase\Migration\BluePrintTable;
use src\DataBase\Migration\Migration;

class MigrationsHandler extends DB
{
    public function tableUp(Migration $migration): void
    {
        $bluePrintTable = new BluePrintTable();
        $tableName = $migration->table;
        $columns = $migration->up($bluePrintTable);
        $this->createTable($tableName, $columns);
    }

    public function tableDown(Migration $migration): void
    {
        $this->dropTable($tableName = $migration->table);
    }
}
