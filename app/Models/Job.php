<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Job extends Model
{

    use HasFactory;

    //when we need unique table name then we can add protected propetrty and perticular table name 
    protected $table = 'job_listings';

    //The fillable property is used inside the model. It takes care of defining which fields are to be considered when the user will insert or update data.
    protected $fillable = ['title', 'salary'];

    public function employer()
    { //Job ma Employer banavu pade if i have a Job and i need information about Employer then the method will be called employer here

        return $this->belongsTo(Employer::class); //Job belongs to Employer 
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
