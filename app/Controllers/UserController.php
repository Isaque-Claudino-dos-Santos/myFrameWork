<?php

namespace app\Controllers;

use app\Http\Request;

class UserController
{
    public function index($id)
    {
        echo 'User index! ID:' . $id;
    }

    public function show()
    {
        echo "
        <form action='/user/123' method='POST'>
            <input type='test' name='name'>
            <button>save</button>
        </form>
        ";
    }

    public function store(Request $request, $id)
    {
        dd($id, 0);
        dd($request->findAll());
    }
}
