<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            DiaSeeder::class,
            AreasEnfoqueSeeder::class,
            TipoAlimentoSeeder::class,
            BebidaSeeder::class,
            AlimentoSeeder::class,
            EjercicioSeeder::class,
            ClienteSeeder::class,
            AlimentoNoConsumidoSeeder::class,
        ]);
    }
}
