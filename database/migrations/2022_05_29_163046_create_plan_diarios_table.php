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
        Schema::create('plan_diarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_plan_nutricional")->references("id")->on("plan_nutricionals")->nullable();
            $table->foreignId("id_plan_ejercicio")->references("id")->on("plan_ejercicios")->nullable();
            $table->foreignId("id_dia")->references("id")->on("dias");
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
        Schema::dropIfExists('plan_diarios');
    }
};
