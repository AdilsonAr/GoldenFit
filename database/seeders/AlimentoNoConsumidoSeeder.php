<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlimentoNoConsumidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("alimento_no_consumidos")->insert([
            [
                "id_cliente" => 1,
                "id_alimentos" => 1,
            ],
            [
                "id_cliente" => 1,
                "id_alimentos" => 2,
            ],
        ]);
    }
}
