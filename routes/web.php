<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;
use App\Models\Job;


Route::get('/', function () {
    return view('home', [ //we can pass second paramter or and argument is array in view 
        'greeting' => 'hello',
        'name' => 'brijesh',
    ]);
});

Route::get('/jobs', function () {
    // return 'hello from about';//return string
    //return ["foo" => "bar"]; //return array

    //('employer') is relation or function in Job class
    $jobs = job::with('employer')->get(); //get() is same as select * 
    return view('jobs', [
        'jobs' => $jobs
    ]);

    //acces the each elemtn and add dynamically and print data dynamically
    // $jobs = [
    //     [
    //         'title' => 'CEO',
    //         'salary' => '500000',
    //         'dskd' => '5564',

    //     ],
    //     [
    //         'title' => 'CTO',
    //         'salary' => '250000',

    //     ],
    //     [
    //         'title' => 'Programmer',
    //         'salary' => '200000',
    //     ],
    //     [
    //         'title' => 'abc',
    //         'salary' => '100000',
    //         'dsd' => 'dfdf',
    //     ],

    // ];

    // foreach ($jobs as $key => $job) {
    //     // dd($job);
    //     foreach ($job as $key1 => $value) {
    //         // dd($key1 . $value);
    //         echo "$key1 $value <br>";
    //     }
    // }


});


//{id} is an wild card variable useful when defining routes that are flexible and can handle multiple different inputs.
Route::get('/jobs/{id}', function ($id) {

    // $job = Arr::first(Job::all(), fn($job) => $job['id'] == $id);
    $job = Job::find($id); //find method in Job class perfom same op as upper line
    // dd($job);
    return view('job', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});
