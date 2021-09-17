<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContribuyenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contribuyente', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nit', 10)->unique()->nullable();
            $table->string('nombre')->nullable();;
            $table->string('apellido');
            $table->string('telefono', 16)->unique()->nullable();
            $table->string('genero', 1)->nullable();;
            $table->date('fecha_nacimiento')->nullable();
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
        Schema::dropIfExists('contribuyente');
    }
}
