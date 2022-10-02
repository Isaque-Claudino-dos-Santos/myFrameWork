<?php

namespace src\DataBase\Migration;



abstract class Migration
{
    public string $table;
    abstract public function up(BluePrintTable $table): array;
    abstract public function down(): string;
}
