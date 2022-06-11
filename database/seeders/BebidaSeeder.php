<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BebidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("bebidas")->insert([
            [
                "nombre" => "Cafe",
                "porcion" => "300 ml",
                "comidaDelDia" => "manana-tarde",
                "calorias" => 3,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Chocolate",
                "porcion" => "300 ml",
                "comidaDelDia" => "manana-tarde",
                "calorias" => 267,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Leche chocolatada",
                "porcion" => "300 ml",
                "comidaDelDia" => "manana-tarde",
                "calorias" => 267,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Leche",
                "porcion" => "300 ml",
                "comidaDelDia" => "manana-tarde",
                "calorias" => 183,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Limonada",
                "porcion" => "300 ml",
                "comidaDelDia" => "mediodia",
                "calorias" => 126,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Jugo de naranja natural",
                "porcion" => "300 ml",
                "comidaDelDia" => "mediodia",
                "calorias" => 146,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                "nombre" => "Jugo de manzana natural",
                "porcion" => "300 ml",
                "comidaDelDia" => "mediodia",
                "calorias" => 152,
                "created_at" => now(),
                "updated_at" => now(),
            ],
        ]);
    }
}
