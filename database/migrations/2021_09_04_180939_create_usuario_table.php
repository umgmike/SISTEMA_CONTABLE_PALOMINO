<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_rol');
            $table->foreign('id_rol','fk_roles')->references('id')->on('rol');
            $table->string('nombre', 250);
            $table->string('apellido', 250);
            $table->string('nit', 10)->unique();
            $table->string('usuario', 25)->unique();
            $table->string('password',250);
            $table->string('telefono', 10)->unique();
            $table->boolean('condicion')->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('usuario');
    }
}
