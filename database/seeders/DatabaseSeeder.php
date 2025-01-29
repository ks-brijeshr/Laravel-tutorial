<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

    //run()is the by default and its call when  db:seed command execute
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'first_name' => 'Test',
            'last_name' => 'User',
            'email' => 'test@example.com',
        ]);

        //if now we need to call job seeder from thia root seeder class then we give reference the class
        $this->call(JobSeeder::class); // OR we can direclty writelike this Job::factory(200)->create() here in this file;
    }
}
