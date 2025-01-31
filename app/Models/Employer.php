<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Employer extends Model
{

    use HasFactory;
    // public function jobs()
    // {
    //     return $this->hasMany(Job::class); 
    // }

    public function jobs()
    {
        //we can say Employer haseMany Jobs
        return $this->hasMany(Job::class); //hasMany means from where our foreign key and all the local keys are came from 
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
