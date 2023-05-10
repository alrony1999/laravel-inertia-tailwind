<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Student',
            'email' => 'student@demo.com',
            'email_verified_at' => now(),
            'password' => Hash::make('student1234'), // password
        ])->assignRole('student');
    }
}
