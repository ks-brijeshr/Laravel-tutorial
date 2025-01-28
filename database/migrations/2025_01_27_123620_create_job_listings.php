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
        Schema::create('job_listings', function (Blueprint $table) {
            $table->id(); //id method within migration its creating a big integer column
            // so when we generates the foreign keys is identical so thats why uisng unsignedBigInteger
            //$table->unsignedBigInteger('employer_id'); 
            $table->foreignIdFor(\App\Models\Employer::class); //The foreignId method is an alias for unsignedBigInteger
            $table->string('title');
            $table->string('salary');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_listings');
    }
};
