<?php

namespace Database\Factories;


use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        $role = $this->faker->randomElement(['user', 'employer']);

        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'username' => $this->faker->unique()->userName(),
            'role' => $role,
            'password' => bcrypt('password'), // default password
            'resume' => $role === 'user' ? $this->faker->filePath() : null,
            'company_name' => $role === 'employer' ? $this->faker->company() : null,
            'company_address' => $role === 'employer' ? $this->faker->address() : null,
            'company_phone' => $role === 'employer' ? $this->faker->phoneNumber() : null,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ];
    }
}
