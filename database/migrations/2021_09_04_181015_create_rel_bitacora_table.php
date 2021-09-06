<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelBitacoraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rel_bitacora', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_usuario')->nullable();
            $table->foreign('id_usuario','fk_usuario_bitacora')->references('id')->on('usuario');
            $table->string('partida');
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
        Schema::dropIfExists('rel_bitacora');
    }
}
