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

    //eager loading is solution of lazy loading 
    //lazyloading(::all()):- when we  have 100 records then this will run 101 query[1 query for fetch all records + 1 query per job to job records]
    //eagerloading(::with('employer')->get()):- retrieving all related models in single query [1 query for get all jobs and 1 query for all the employee associated with the jobs] reducing the total number of queries
    $jobs = Job::with('employer')->latest()->cursorPaginate(3); //get() is same as select * so if we have 100000 of records then increase the load thats why we use paginate() for pagination
    return view('jobs/index', [
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

Route::get('/jobs/create', function () {
    return view('jobs/create');
});


//{id} is an wild card variable useful when defining routes that are flexible and can handle multiple different inputs.
Route::get('/jobs/{id}', function ($id) {

    // $job = Arr::first(Job::all(), fn($job) => $job['id'] == $id);
    $job = Job::find($id); //find method in Job class perfom same op as upper line
    // dd($job);
    return view('job/show', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});


Route::post('/jobs', function () {
    //using request() helper function we can get the all data from the form
    // dd(request());

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1 //errro through karse km ke Job model na fillable ma employer_id nathi ae add akrvi padse
    ]);

    return redirect('/jobs');
});
