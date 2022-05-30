<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agregacion_ejercicios', function (Blueprint $table) {
            $table->id();
            $table->integer("minutos_duracion");
            $table->foreignId("id_plan_diario")->references("id")->on("plan_diarios");
            $table->foreignId("id_ejercicio")->references("id")->on("ejercicios");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agregacion_ejercicios');
    }
};
