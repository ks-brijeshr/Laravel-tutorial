<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [   //second paramter array in view 
        'greeting' => 'hello',
        'name' => 'brijesh',
    ]);
});

Route::get('/about', function () {
    // return 'hello from about';//return string
    //return ["foo" => "bar"]; //return array
    return view('about'); // return view page
});

Route::get('/contact', function () {
    return view('contact');
});
