<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() {
        DB::table('users')->truncate(); //for cleaning earlier data to avoid duplicate entries
        DB::table('users')->insert([
          'name' => 'the admin user',
          'email' => 'iamadmin@gmail.com',
          'role' => 'admin',
          'password' => Hash::make('password'),
        ]);
        DB::table('users')->insert([
          'name' => 'the employee user',
          'email' => 'iamanemployee@gmail.com',
          'role' => 'employee',
          'password' => Hash::make('password'),
        ]);
      }
}
