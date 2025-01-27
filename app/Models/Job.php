<?php

namespace App\Models;

use Illuminate\Support\Arr;


class Job
{
    public static function all(): array //explicitly telling what type of data is return by then functio
    {
        return [
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
            ],

        ];
    }
    public static function find(int $id): array //jo return type na lakhyu hoy ane koi aevi id acccess kariye je data ma ke array ma nathi to alag error avi sake
    {
        //static::all() and Job::all() both are same 
        //The static keyword is used to define class properties and methods that belong to the class itself
        $job = Arr::first(static::all(), fn($job) => $job['id'] == $id);

        if (! $job) {
            abort(404);
        }
        return $job;
    }
}
