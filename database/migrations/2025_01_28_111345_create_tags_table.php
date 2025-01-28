<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('job_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Job::class, 'job_listings_id')->constrained()->cascadeOnDelete(); //handle Job Id column and prepare job Id foreign key 
            $table->foreignIdFor(\App\Models\Tag::class)->constrained()->cascadeOnDelete(); //cascadeOndelete:- jyare koi pan redord delete karye tyare i want to delete and cascade the pivot record
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tags');
        Schema::dropIfExists('job_tag');
    }
};
