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
        Schema::create('agregacion_bebidas', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_agregacion_comidas")->references("id")->on("agregacion_comidas");
            $table->foreignId("id_bebida")->references("id")->on("bebidas");
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
        Schema::dropIfExists('agregacion_bebidas');
    }
};
