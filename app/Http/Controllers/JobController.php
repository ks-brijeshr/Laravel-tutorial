<?php

namespace App\Http\Controllers;

use App\Mail\JobPosted;
use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{
    public function index()
    {
        //eager loading is solution of lazy loading 
        //lazyloading(::all()):- when we  have 100 records then this will run 101 query[1 query for fetch all records + 1 query per job to job records]
        //eagerloading(::with('employer')->get()):- retrieving all related models in single query [1 query for get all jobs and 1 query for all the employee associated with the jobs] reducing the total number of queries
        $jobs = Job::with('employer')->latest()->cursorPaginate(3); //get() is same as select * so if we have 100000 of records then increase the load thats why we use paginate() for pagination
        return view('jobs/index', [
            'jobs' => $jobs
        ]);
    }

    public function create()
    {
        return view('jobs/create');
    }

    public function show(Job $job)
    {
        return view('jobs/show', ['job' => $job]);
    }

    public function store()
    {
        //using request() helper function we can get the all data from the form
        // dd(request());

        //validation:- validate() provide array of attribute and perform validation to it
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);

        $job = Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1 //errro through karse km ke Job model na fillable ma employer_id nathi ae add akrvi padse
        ]);

        Mail::to($job->employer->user)->send(
            new JobPosted($job)
        );

        return redirect('/jobs');
    }

    public function edit(Job $job)
    {
        //je user login ohy tej edit page ma jay sake
        // if (Auth::guest()) {
        //     return redirect('/login');
        // }

        //je user ae job create kari hoy tej edit  kari sake
        // if ($job->employer->user->isNot(Auth::user())) {
        //     abort(403);
        // }

        return view('jobs/edit', ['job' => $job]);
    }

    public function update(Job $job)
    {
        //authorize
        // Gate::authorize('edit-job', $job);
        //validate
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']
        ]);


        //update the page
        $job->update([
            'title' => request('title'),
            'salary' => request('salary')
        ]);

        //redirect to the job page

        return redirect('/jobs/' . $job->id);
    }

    public function destroy(Job $job)
    {
        //authorize(on hold...)
        // Gate::authorize('edit-job', $job);

        //delete  the job
        $job->delete();
        //redirect
        return redirect('/jobs');
    }
}
