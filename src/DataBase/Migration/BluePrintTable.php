<?php

namespace src\DataBase\Migration;

use function PHPUnit\Framework\returnSelf;

class BluePrintTable
{
    private string $column;


    public function id(): self
    {
        $this->column = 'id int auto_increment primary key';
        return $this;
    }

    public function str(string $name, int $size = 100): self
    {
        $this->column = "$name varchar($size)";
        return $this;
    }

    public function notNull(): self
    {
        $this->column .= ' not null';
        return $this;
    }

    public function end(): string
    {
        return $this->column;
    }
}
