<?php

namespace src\DataBase;


class DB
{
    protected \PDO $pdo;
    private $conection;

    public function __construct()
    {
        $this->conection = new Conection();
        $this->pdo = $this->conection->getPDO();
    }
}
