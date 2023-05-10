<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'create teachers']);
        Permission::create(['name' => 'create students']);
        Permission::create(['name' => 'delete teachers']);
        Permission::create(['name' => 'delete students']);
    }
}
