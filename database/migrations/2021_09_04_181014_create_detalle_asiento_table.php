<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleAsientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_asiento', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_asiento');
            $table->unsignedInteger('id_cuenta');
            $table->double('debe');
            $table->double('haber');
            $table->timestamps();
            $table->foreign('id_cuenta','fk_cuenta')->references('id')->on('cuenta');
            $table->foreign('id_asiento','fk_asiento')->references('id')->on('asiento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_asiento');
    }
}
