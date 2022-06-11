<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlimentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("alimentos")->insert([
            [
                "nombre" => "Pan integral",
                "porcion" => "2 rebanadas",
                "calorias" => 140,
                "id_tipo" => 1,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Tortillas de Maíz",
                "porcion" => "2",
                "calorias" => 104,
                "id_tipo" => 1,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Arroz frito",
                "porcion" => "10 gramos",
                "calorias" => 163,
                "id_tipo" => 1,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Avena",
                "porcion" => "10 gramos",
                "calorias" => 389,
                "id_tipo" => 1,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Pan dulce",
                "porcion" => "60 gramos",
                "calorias" => 220,
                "id_tipo" => 1,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Frijoles cocidos",
                "porcion" => "100 gramos",
                "calorias" => 151,
                "id_tipo" => 1,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Lentejas cocidas",
                "porcion" => "100 gramos",
                "calorias" => 165,
                "id_tipo" => 1,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Zanahorias",
                "porcion" => "235 gramos",
                "calorias" => 100,
                "id_tipo" => 2,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Aguacate",
                "porcion" => "125 gramos",
                "calorias" => 200,
                "id_tipo" => 2,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Papa cocida",
                "porcion" => "100 gramos",
                "calorias" => 52,
                "id_tipo" => 2,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Coliflor",
                "porcion" => "100 gramos",
                "calorias" => 25,
                "id_tipo" => 2,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Pepino",
                "porcion" => "100 gramos",
                "calorias" => 15,
                "id_tipo" => 2,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Remolacha",
                "porcion" => "100 gramos",
                "calorias" => 43,
                "id_tipo" => 2,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Manzana",
                "porcion" => "100 gramos",
                "calorias" => 52,
                "id_tipo" => 3,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Piña",
                "porcion" => "100 gramos",
                "calorias" => 55,
                "id_tipo" => 3,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Pera",
                "porcion" => "100 gramos",
                "calorias" => 55,
                "id_tipo" => 3,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Plátano",
                "porcion" => "100 gramos",
                "calorias" => 88,
                "id_tipo" => 3,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Melón",
                "porcion" => "100 gramos",
                "calorias" => 54,
                "id_tipo" => 3,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Mandarina",
                "porcion" => "100 gramos",
                "calorias" => 50,
                "id_tipo" => 3,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Mango",
                "porcion" => "100 gramos",
                "calorias" => 62,
                "id_tipo" => 3,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Ciruela",
                "porcion" => "100 gramos",
                "calorias" => 47,
                "id_tipo" => 3,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Sandía",
                "porcion" => "200 gramos",
                "calorias" => 60,
                "id_tipo" => 3,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Uvas",
                "porcion" => "200 gramos",
                "calorias" => 140,
                "id_tipo" => 3,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Queso ricotta",
                "porcion" => "100 gramos",
                "calorias" => 140,
                "id_tipo" => 4,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Queso mozzarella ",
                "porcion" => "100 gramos",
                "calorias" => 330,
                "id_tipo" => 4,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Yogur natural",
                "porcion" => "200 gramos",
                "calorias" => 102,
                "id_tipo" => 4,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Queso cheddar",
                "porcion" => "100 gramos",
                "calorias" => 403,
                "id_tipo" => 4,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Nata",
                "porcion" => "100 gramos",
                "calorias" => 204,
                "id_tipo" => 4,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Pechuga de pollo",
                "porcion" => "200 gramos",
                "calorias" => 150,
                "id_tipo" => 5,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Carne de vaca",
                "porcion" => "200 gramos",
                "calorias" => 326,
                "id_tipo" => 5,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Atún",
                "porcion" => "200 gramos",
                "calorias" => 388,
                "id_tipo" => 5,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Salmón",
                "porcion" => "200 gramos",
                "calorias" => 274,
                "id_tipo" => 5,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Pechuga de pavo",
                "porcion" => "200 gramos",
                "calorias" => 222,
                "id_tipo" => 5,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Carne de puerco",
                "porcion" => "200 gramos",
                "calorias" => 262,
                "id_tipo" => 5,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Carne de conejo",
                "porcion" => "200 gramos",
                "calorias" => 234,
                "id_tipo" => 5,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Tofu",
                "porcion" => "200 gramos",
                "calorias" => 152,
                "id_tipo" => 5,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Semillas de ajonjolí",
                "porcion" => "100 gramos",
                "calorias" => 584,
                "id_tipo" => 5,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Semillas de mijo",
                "porcion" => "100 gramos",
                "calorias" => 360,
                "id_tipo" => 5,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Cacahuate o maní",
                "porcion" => "100 gramos",
                "calorias" => 589,
                "id_tipo" => 5,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Frijoles blancos cocidos",
                "porcion" => "200 gramos",
                "calorias" => 278,
                "id_tipo" => 5,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Arvejas cocidas",
                "porcion" => "200 gramos",
                "calorias" => 236,
                "id_tipo" => 5,
                "created_at" => now(),
                "updated_at" => now(),
            ],
        ]);
    }
}
