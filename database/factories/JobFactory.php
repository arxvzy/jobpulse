<?php

namespace Database\Factories;

use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    protected $model = Job::class;

    public function definition()
    {
        return [
            'title' => $this->faker->jobTitle(),
            'description' => $this->faker->paragraph(3),
            'salary' => $this->faker->numberBetween(3000000, 10000000),
            'location' => $this->faker->city(),
            'job_type' => $this->faker->randomElement(['Full Time', 'Part Time', 'Magang', 'Remote']),
            'status' => $this->faker->randomElement(['open', 'closed']),
            'user_id' => User::factory()->create(['role' => 'employer'])->id,
        ];
    }
}
