<?php

namespace app\Migrations;

use src\DataBase\Migration\BluePrintTable;
use src\DataBase\Migration\Migration;

class UserMigration extends Migration
{
    public string $table = 'users';

    public function up(BluePrintTable $table): array
    {
        $table->name = 'users';
        return [
            $table->id()->end(),
            $table->str('name')->notNull()->end()
        ];
    }

    public function down(): string
    {
        return $this->table;
    }
}
