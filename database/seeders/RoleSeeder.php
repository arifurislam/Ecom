<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Admin',
            'slug' => 'admin',
            'status' => 1,
            'created_at' => '2023-07-26 18:47:29',
            'updated_at' => '2023-07-26 18:47:29',
        ]);
        DB::table('roles')->insert([
            'name' => 'Author',
            'slug' => 'author',
            'status' => 1,
            'created_at' => '2023-07-26 18:47:29',
            'updated_at' => '2023-07-26 18:47:29',
        ]);
    }
}
