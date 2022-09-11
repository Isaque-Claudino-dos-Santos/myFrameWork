<?php

namespace app\Controllers;


class UserController extends Controller
{
    public function index()
    {
        echo 'Welcome the page user!!';
    }

    public function test($name, $age)
    {
        if (!$this->tableExist('user')) {
            $columns = [
                'name' => 'varchar(100)',
                'age' => 'int(150)'
            ];
            $this->createTable('user', $columns);
        }

        $this->insert('user', ['name' => $name, 'age' => $age]);
        echo $age;
        dd($name);
    }
}
