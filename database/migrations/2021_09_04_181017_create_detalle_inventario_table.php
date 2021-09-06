<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleInventarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_inventario', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('id_cuenta');
            $table->foreign('id_cuenta','fk_detalle_cuenta')->references('id')->on('cuenta');

            $table->unsignedInteger('id_inventario');
            $table->foreign('id_inventario','fk_inventarios_detalle')->references('id')->on('inventario_final');

            $table->double('sub_total');
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
        Schema::dropIfExists('detalle_inventario');
    }
}
