<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("dias")->insert([
            [
                "nombre" => "lunes",
            ],
            [
                "nombre" => "martes",
            ],
            [
                "nombre" => "miercoles",
            ],
            [
                "nombre" => "jueves",
            ],
            [
                "nombre" => "viernes",
            ],
            [
                "nombre" => "sabado",
            ],
            [
                "nombre" => "domingo",
            ]
        ]);
    }
}
