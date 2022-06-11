<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AreasEnfoqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("areas_enfoques")->insert([
            [
                "nombre" => "grasa del vientre",
            ],
            [
                "nombre" => "brazos",
            ],
            [
                "nombre" => "piernas",
            ],
            [
                "nombre" => "papada",
            ],
            [
                "nombre" => "gluteos",
            ],
            [
                "nombre" => "espalda",
            ]
        ]);
    }
}
