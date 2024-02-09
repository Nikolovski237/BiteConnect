<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed a user with the role 'customer'
        DB::table('users')->insert([
            'name' => 'Customer User',
            'email' => 'customer@example.com',
            'password' => Hash::make('password'),
            'role' => 'customer',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Seed a user with the role 'master_admin'
        DB::table('users')->insert([
            'name' => 'Master Admin User',
            'email' => 'master_admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'master_admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
