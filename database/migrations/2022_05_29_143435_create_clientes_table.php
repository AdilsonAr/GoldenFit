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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string("areasEnfoque");
            $table->integer("gustoPorCarne");
            $table->integer("gustoPorCerdo");
            $table->integer("gustoPorPescado");
            $table->string("vejetalesQueNoConsume");
            $table->string("carbohidratosQueNoConsume");
            $table->string("frutosQueNoConsume");
            $table->string("alimentosQueNoConsume");
            $table->string("alergias");
            $table->float("horasParaCocinar");
            $table->boolean("desayuna");
            $table->float("horasParaEjercicio");
            $table->integer("nivelActividadFisica");
            $table->integer("edad");
            $table->float("estatura");
            $table->float("pesoActual");
            $table->float("pesoDeseado");
            $table->foreignId("id_usuario")->references("id")->on("users");
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
        Schema::dropIfExists('clientes');
    }
};
