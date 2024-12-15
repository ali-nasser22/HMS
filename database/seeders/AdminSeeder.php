<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        $adminId = DB::table('users')->insertGetId([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'gender' => 'male',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Assign admin role
        DB::table('user_roles')->insert([
            'user_id' => $adminId,
            'role_id' => 1, // Assuming admin role has id 1
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
