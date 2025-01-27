<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;

Route::get('/', function () {
    return view('home', [ //we can pass second paramter or and argument is array in view 
        'greeting' => 'hello',
        'name' => 'brijesh',
    ]);
});

Route::get('/jobs', function () {
    // return 'hello from about';//return string
    //return ["foo" => "bar"]; //return array

    return view('jobs', [


        'jobs' => [
            [
                'id' => 1,
                'title' => 'CEO',
                'salary' => '500000',
                'dskd' => '5564',
            ],
            [
                'id' => 2,
                'title' => 'CTO',
                'salary' => '250000',

            ],
            [
                'id' => 3,
                'title' => 'Programmer',
                'salary' => '200000',
            ],
            [
                'id' => 4,
                'title' => 'abc',
                'salary' => '100000',
                'dsds' => 'sdsd'

            ],
            [
                'id' => 5,
                'title' => 'dsbhdjhb',
                'salary' => '121112',
            ],

        ]
    ]); // return view page

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
    $jobs = [
        [
            'id' => 1,
            'title' => 'CEO',
            'salary' => '500000',
        ],
        [
            'id' => 2,
            'title' => 'CTO',
            'salary' => '250000',
        ],
        [
            'id' => 3,
            'title' => 'Programmer',
            'salary' => '200000',
        ]
    ];

    $job = Arr::first($jobs, fn($job) => $job['id'] == $id);
    // dd($job);
    return view('job', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});
