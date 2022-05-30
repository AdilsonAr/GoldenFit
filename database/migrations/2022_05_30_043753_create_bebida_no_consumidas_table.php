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
        Schema::create('bebida_no_consumidas', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_cliente")->references("id")->on("clientes");
            $table->foreignId("id_bebidas")->references("id")->on("bebidas");
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
        Schema::dropIfExists('bebida_no_consumidas');
    }
};
