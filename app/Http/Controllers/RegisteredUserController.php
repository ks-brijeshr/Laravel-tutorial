<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

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
        // dd(request()->all());

        //validate
        $attributes = request()->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email', 'max:254'],
            'password' => ['required', Password::min(6), 'confirmed']
        ]);

        // dd($attributes);

        //create the user in databse

        //1st way:-
        // User::create([
        //     'first_name' => request('first_name'),
        //     'last_name' => request('last_name'), //and so on.. for all the field 
        // ]);

        //2nd way:-
        $user = User::create($attributes); //it can create all atrributes uper na varibale ma je validate thaya hoy tej store thay aetle tej ahiya create thay jase

        //login
        Auth::login($user);

        //redirect
        return redirect('/jobs');
    }
}
