<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_regimen');
            $table->foreign('id_regimen','fk_regimen_empresa')->references('id')->on('regimen');
            $table->unsignedInteger('id_contribuyente');
            $table->foreign('id_contribuyente','fk_contribuyente_empresa')->references('id')->on('contribuyente');
            $table->string('nit', 10)->unique();
            $table->year('anyo_contable');
            $table->string('nombre_establecimiento', 250)->unique();
            $table->text('descripcion');
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
        Schema::dropIfExists('empresa');
    }
}
