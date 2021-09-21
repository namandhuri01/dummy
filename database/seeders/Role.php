<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Illuminate\Database\Seeder;

class Role extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('roles')->insert([
            [
                'name' => 'super-admin',
                'description' => 'superadmin'
            ],
            [
                'name' => 'editor',
                'description' => 'editor can only see list and edit data'
            ],
            [
                'name' => 'manager',
                'description' => 'manager can use all permission except delete'
            ],
            [
                'name' => 'student',
                'description' => 'student'
            ],
            [
                'name' => 'college',
                'description' => 'college'
            ]
        ]);
    }
}
