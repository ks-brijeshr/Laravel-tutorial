<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        // dd('hello from login');
        return view('auth/login');
    }

    public function store()
    {
        // dd(request()->all());

        //validate
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        //attempt to login the user

        if (! Auth::attempt($attributes)) { //attempt() return boolean if login success or not
            throw ValidationException::withMessages([
                'email' => 'sorry, those credential not matched'
            ]);
        }

        //regenerate the session token
        request()->session()->regenerate(); //Changes (regenerate) the session ID: Prevents attackers from using the old session.

        //redirect
        return redirect('/jobs');
    }

    public function destroy()
    {
        // dd('logout the user');
        Auth::logout();

        return redirect('/');
    }
}
