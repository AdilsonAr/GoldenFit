<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;


class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("clientes")->insert([
            [
                "gustoPorCarne" => 3,
                "gustoPorCerdo" => 3,
                "gustoPorPescado" => 3,
                "horasParaCocinar" => 1,
                "desayuna" => true,
                "horasParaEjercicio" => 1,
                "nivelActividadFisica" => 2,
                "edad" => 23,
                "estatura" => 170,
                "pesoActual" => 170,
                "pesoDeseado" => 160,
                "nombre" => "Adilson",
                "sexo" => "masculino",
                "apellidos" => "Arbuez",
                "telefono" => "3423-5655",
                "id_usuario" => 1,
            ],
        ]);
    }
}
