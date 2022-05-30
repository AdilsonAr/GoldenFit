<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoAlimentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("tipo_alimentos")->insert([
            [
                "nombre" => "Granos",
            ],
            [
                "nombre" => "Verduras",
            ],
            [
                "nombre" => "Frutas",
            ],
            [
                "nombre" => "Lacteos",
            ],
            [
                "nombre" => "Proteinas",
            ],
        ]);
    }
}
