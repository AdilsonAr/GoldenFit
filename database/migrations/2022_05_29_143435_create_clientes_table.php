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
            //1 (odio),2 (neutral),3 (me encanta)
            $table->integer("gustoPorCarne");
            //1 (odio),2 (neutral),3 (me encanta)
            $table->integer("gustoPorCerdo");
            //1 (odio),2 (neutral),3 (me encanta)
            $table->integer("gustoPorPescado");
            $table->float("horasParaCocinar");
            $table->boolean("desayuna");
            $table->float("horasParaEjercicio");
            //1 (inactivo),2 (rarmente activo 1-2 entrenos por semana)
            //3 (activo 3-5 entrenos por semana)
            $table->integer("nivelActividadFisica");
            $table->integer("edad");
            //metros
            $table->float("estatura");
            //libras
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
