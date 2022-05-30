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
        Schema::create('agregacion_alimentos', function (Blueprint $table) {
            $table->id();
            $table->integer("cantidad");
            $table->foreignId("id_agregacion_comidas")->references("id")->on("agregacion_comidas");
            $table->foreignId("id_alimento")->references("id")->on("alimentos");
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
        Schema::dropIfExists('agregacion_alimentos');
    }
};
