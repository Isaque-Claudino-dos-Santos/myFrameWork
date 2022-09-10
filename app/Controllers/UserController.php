<?php

namespace app\Controllers;

class UserController
{
    public function index($id)
    {
        echo 'User index! ID:' . $id;
    }

    public function show($id, $tell)
    {

        echo 'Hello user ' . $id . ' with tell ' . $tell;
    }
}
