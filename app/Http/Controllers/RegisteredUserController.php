<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
    public function create()
    {
        // dd('hello');
        return view('auth/register');
    }

    public function store()
    {
        // dd('todo');
        dd(request()->all());
    }
}
