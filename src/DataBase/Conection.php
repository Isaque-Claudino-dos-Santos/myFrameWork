<?php

namespace src\DataBase;


abstract class Conection
{
    protected readonly \PDO $pdo;


    public function __construct()
    {
        $this->pdo = new \PDO(
            DB_DIALECT . ':host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME,
            DB_USER,
            DB_PASS
        );
    }
}
