<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert([
            [
                "id" => 1,
                "name" => "Jose",
                "role" => "admin",
                "email" => "Jose@itca.edu",
                "email_verified_at" => now(),
                "password" => Hash::make('admin1'),
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "id" => 2,
                "name" => "David",
                "role" => "admin",
                "email" => "David@itca.edu",
                "email_verified_at" => now(),
                "password" => Hash::make('admin2'),
                "created_at" => now(),
                "updated_at" => now(),
            ],
            ]);
    }
}
