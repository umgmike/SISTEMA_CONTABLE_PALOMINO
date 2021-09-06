<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventarioFinalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventario_final', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('id_usuario');
            $table->foreign('id_usuario','fk_usuario')->references('id')->on('usuario');

            $table->date('fecha_inventario')->format('d-m-Y');
            $table->double('monto_total')->default(0.00);
            $table->text('descripcion')->nullable();
            $table->boolean('condicion')->default(1);
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
        Schema::dropIfExists('inventario_final');
    }
}
