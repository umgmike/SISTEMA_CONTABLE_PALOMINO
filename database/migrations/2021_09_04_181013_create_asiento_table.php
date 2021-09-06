<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asiento', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_usuario')->nullable();
            $table->date('fecha_asiento')->format('d-m-Y');
            $table->string('numero_partida');
            $table->double('total_debe');
            $table->double('total_haber');
            $table->text('descripcion');
            $table->boolean('condicion')->default(1);
            $table->timestamps();
            $table->foreign('id_usuario','fk_users')->references('id')->on('usuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asiento');
    }
}
