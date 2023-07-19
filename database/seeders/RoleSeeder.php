<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::insert([
            [
                'role_name' => 'SuperAdmin',
                'description' => 'Super Administrator',
            ],
            [
                'role_name' => 'Admin',
                'description' => 'Administrator',
            ],
            [
                'role_name' => 'Operator',
                'description' => 'Operator Support',
            ],
            [
                'role_name' => 'User',
                'description' => 'Normal Account',
            ],
            [
                'role_name' => 'Banned',
                'description' => 'Account is banned',
            ],
        ]);
    }
}
