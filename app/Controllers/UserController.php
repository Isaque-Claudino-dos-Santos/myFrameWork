<?php

namespace app\Controllers;

class UserController
{
    public function index($id)
    {
        echo 'User index! ID:' . $id;
    }

    public function show()
    {
        echo 'ok show';
    }

    public function store()
    {
        dd($_POST);
    }
}
