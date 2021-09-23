<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'role_id' => 1,
                'email' => 'admin@yopmail.com',
                'password' => Hash::make('password'),
            ],[
                'name' => 'editor',
                'role_id' => 2,
                'email' => 'editor@yopmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'manager',
                'role_id' => 3,
                'email' => 'manager@yopmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'student',
                'role_id' => 4,
                'email' => 'student@yopmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'college',
                'role_id' => 5,
                'email' => 'college@yopmail.com',
                'password' => Hash::make('password'),
            ],
        ]);
    }
}
