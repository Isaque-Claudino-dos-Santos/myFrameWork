<?php

namespace app\Controllers;

class UserController
{
    public function index()
    {
        echo 'User index!';
    }

    public function show($id, $tell)
    {

        echo 'Hello user ' . $id . ' with tell ' . $tell;
    }
}
