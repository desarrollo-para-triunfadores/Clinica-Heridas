<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfiguracionesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('configuraciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('telefono')->nullable();
            $table->string('telefono_contacto')->nullable();
            $table->string('email')->nullable();
            $table->string('direccion')->nullable();
            $table->string('descripcion', 500)->nullable();
            $table->string('logo');
            $table->string('apodo')->nullable();
            $table->string('apodo_abreviado')->nullable();
            $table->integer('localidad_id')->unsigned();
            $table->foreign('localidad_id')->references('id')->on('localidades')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('configuraciones');
    }

}
