<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuenta', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_categoria');
            $table->unsignedInteger('id_categoria_cuenta');
            $table->unsignedInteger('id_cors');
            $table->string('codigoCuenta')->unique();
            $table->string('nombreCuenta', 200);
            $table->boolean('condicion')->default(1);
            $table->timestamps();

            $table->foreign('id_categoria','fk_categoria')->references('id')->on('categoria');

            $table->foreign('id_categoria_cuenta','fk_categoria_cuenta')->references('id')->on('categoria_cuenta');

            $table->foreign('id_cors','fk_cors')->references('id')->on('cors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cuenta');
    }
}
