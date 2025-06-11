<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\User;
use App\Models\Application;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@google.com',
            'username' => 'admin',
            'role' => 'employer',
            'password' => bcrypt('121212'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'company_name' => 'Admin',
            'company_address' => 'Admin',
            'company_phone' => '121212',
        ]);

        User::factory()->create([
            'name' => 'Admin 2',
            'email' => 'admin2@google.com',
            'username' => 'admin2',
            'role' => 'user',
            'password' => bcrypt('121212'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'resume' => 'admin.pdf',
        ]);

        // 5 employers
        $employers = User::factory(5)->create(['role' => 'employer']);

        // 10 users
        $users = User::factory(10)->create(['role' => 'user']);

        // 20 job posts
        $jobs = Job::factory(20)->create([
            'user_id' => $employers->random()->id,
        ]);

        // 50 applications
        foreach (range(1, 50) as $i) {
            Application::factory()->create([
                'user_id' => $users->random()->id,
                'job_id' => $jobs->random()->id,
            ]);
        }
    }
}
