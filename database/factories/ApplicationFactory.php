<?php

namespace Database\Factories;


use App\Models\Application;
use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApplicationFactory extends Factory
{
    protected $model = Application::class;

    public function definition()
    {
        return [
            'user_id' => User::factory()->create(['role' => 'user'])->id,
            'job_id' => Job::factory()->create()->id,
            'application_status' => $this->faker->randomElement(['pending', 'accepted', 'rejected']),
            'application_date' => $this->faker->dateTimeBetween('-1 month', 'now'),
        ];
    }
}
