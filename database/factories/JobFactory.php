<?php

namespace Database\Factories;

use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle(),
            //Employer::factory it willl refereance to anemployer factory
            'employer_id' => Employer::factory(), //jyare aa line par code pochase tyare aene kbr padse ke Employer class ni facorty jova ni che aemam thi id leva ni che 
            //EmployerFactory ni id is substituted as Employerid here 
            'salary' => '50000', //in case of number we cant generate dummy and diffrent numbers then we give it here
        ];
    }
}
