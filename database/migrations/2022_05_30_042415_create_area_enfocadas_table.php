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
        Schema::create('area_enfocadas', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_cliente")->references("id")->on("clientes");
            $table->foreignId("id_areas_de_enfoque")->references("id")->on("areas_de_enfoque");
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
        Schema::dropIfExists('area_enfocadas');
    }
};
