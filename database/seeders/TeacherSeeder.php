<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Teacher',
            'email' => 'teacher@demo.com',
            'email_verified_at' => now(),
            'password' => Hash::make('teacher1234'), // password
        ])->assignRole('teacher');
    }
}
