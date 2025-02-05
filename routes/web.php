<?php

use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;
use App\Models\Job;
use Illuminate\Auth\Events\Logout;

Route::view('/', 'home');

Route::view('/contact', 'contact');

//group of JobController routes
// Route::controller(JobController::class)->group(function () {
//     //index:- display all jobs
//     Route::get('/jobs', [JobController::class, 'index']);

//     //create job
//     Route::get('/jobs/create', [JobController::class, 'create']);


//     //show perticular job 
//     Route::get('/jobs/{job}', [JobController::class, 'show']);

//     //create new job (store)
//     Route::post('/jobs', [JobController::class, 'store']);

//     //edit
//     Route::get('/jobs/{job}/edit', [JobController::class, 'edit']);

//     //update
//     Route::patch('/jobs/{job}', [JobController::class, 'update']);

//     //delete
//     Route::delete('/jobs/{job}', [JobController::class, 'destroy']);
// });


//badha routes ni jagya ae Route:;resource lakhisu to pan badha j routs JobController class mathi load thase
//'jobs' is an reasource or URI name
// Route::resource('jobs', JobController::class);


Route::get('/jobs', [JobController::class, 'index']);
Route::get('/jobs/create', [JobController::class, 'create']);
Route::post('/jobs', [JobController::class, 'store'])->middleware('auth'); //means you have to be signed in
Route::get('/jobs/{job}', [JobController::class, 'show']);
// middleware('auth') means you have to be signed in and can() means you need to permission to edit the job
Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->middleware('auth')->can('edit', 'job');
Route::patch('/jobs/{job}', [JobController::class, 'update']);
Route::delete('/jobs/{job}', [JobController::class, 'destroy']);

//auth
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);


Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);




















// Route::get('/jobs', function () {
//     // return 'hello from about';//return string
//     //return ["foo" => "bar"]; //return array

//     //eager loading is solution of lazy loading 
//     //lazyloading(::all()):- when we  have 100 records then this will run 101 query[1 query for fetch all records + 1 query per job to job records]
//     //eagerloading(::with('employer')->get()):- retrieving all related models in single query [1 query for get all jobs and 1 query for all the employee associated with the jobs] reducing the total number of queries
//     $jobs = Job::with('employer')->latest()->cursorPaginate(3); //get() is same as select * so if we have 100000 of records then increase the load thats why we use paginate() for pagination
//     return view('jobs/index', [
//         'jobs' => $jobs
//     ]);

//     //acces the each elemtn and add dynamically and print data dynamically
//     // $jobs = [
//     //     [
//     //         'title' => 'CEO',
//     //         'salary' => '500000',
//     //         'dskd' => '5564',

//     //     ],
//     //     [
//     //         'title' => 'CTO',
//     //         'salary' => '250000',

//     //     ],
//     //     [
//     //         'title' => 'Programmer',
//     //         'salary' => '200000',
//     //     ],
//     //     [
//     //         'title' => 'abc',
//     //         'salary' => '100000',
//     //         'dsd' => 'dfdf',
//     //     ],

//     // ];

//     // foreach ($jobs as $key => $job) {
//     //     // dd($job);
//     //     foreach ($job as $key1 => $value) {
//     //         // dd($key1 . $value);
//     //         echo "$key1 $value <br>";
//     //     }
//     // }


// });


//create job
// Route::get('/jobs/create', function () {
//     return view('jobs/create');
// });


//show perticular job 
// //{job} is an wild card that represent id in database
// Route::get('/jobs/{job}', function (Job $job) {

//     return view('jobs/show', ['job' => $job]);
// });



//create new job (store)
// Route::post('/jobs', function () {
//     //using request() helper function we can get the all data from the form
//     // dd(request());

//     //validation:- validate() provide array of attribute and perform validation to it
//     request()->validate([
//         'title' => ['required', 'min:3'],
//         'salary' => ['required']
//     ]);

//     Job::create([
//         'title' => request('title'),
//         'salary' => request('salary'),
//         'employer_id' => 1 //errro through karse km ke Job model na fillable ma employer_id nathi ae add akrvi padse
//     ]);

//     return redirect('/jobs');
// });


//edit
// Route::get('/jobs/{job}/edit', function (Job $job) {

//     return view('jobs/edit', ['job' => $job]);
// });

//update
// Route::patch('/jobs/{job}', function (Job $job) {
//     //validate
//     request()->validate([
//         'title' => ['required', 'min:3'],
//         'salary' => ['required']
//     ]);
//     //authorize(on hold...)

//     //update the page
//     $job->update([
//         'title' => request('title'),
//         'salary' => request('salary')
//     ]);

//     //redirect to the job page

//     return redirect('/jobs/' . $job->id);
// });


//delete
// Route::delete('/jobs/{job}', function (Job $job) {
//     //authorize(on hold...)

//     //delete  the job
//     $job->delete();
//     //redirect
//     return redirect('/jobs');
// });
