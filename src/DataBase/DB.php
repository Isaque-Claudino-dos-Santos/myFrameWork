<?php

namespace src\DataBase;

use Exception;

abstract class DB extends Conection
{
    protected function tableExist(string $tableName): bool
    {
        try {
            $query = $this->pdo->prepare("select 1 from $tableName");
            $query->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    private function concatKeyValue(string $separator, array $array): array
    {
        $newArray = [];
        foreach ($array as $key => $value) {
            $newArray[] = "$key" . $separator . "$value";
        }
        return $newArray;
    }

    protected function createTable(string $tableName, array $column): void
    {
        $column = $this->concatKeyValue(' ', $column);
        $columnQuery = implode(',', $column);

        $query = $this->pdo->prepare("create table $tableName ( $columnQuery )");
        $query->execute();
    }

    protected function dropTable(string $tableName)
    {
        $query = $this->pdo->prepare("drop table $tableName");
        $query->execute();
    }

    protected function insert(string $table, $column)
    {
    }
}
