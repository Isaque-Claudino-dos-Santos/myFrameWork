<?php

namespace src\DataBase;


class Conection
{
    private \PDO $pdo;


    public function __construct()
    {
        $this->pdo = new \PDO(
            DB_DIALECT . ':host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME,
            DB_USER,
            DB_PASS
        );
    }

    public  function getPDO()
    {
        return $this->pdo;
    }
}
