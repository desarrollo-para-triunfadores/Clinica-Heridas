<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValoracionTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('valoraciones', function (Blueprint $table) {
            $table->increments('id');

            $table->enum('diagnostico', ['presuntivo', 'definitivo']);
            $table->string('fecha')->nullable();
            $table->string('desencadenante', 1000)->nullable();


            $table->integer('complicacion_id')->unsigned();
            $table->foreign('complicacion_id')->references('id')->on('complicaciones')->onDelete('cascade');

            $table->string('factoresriesgo', 1000)->nullable();
            $table->string('signossintomas', 1000)->nullable();

            $table->string('observaciones', 500)->nullable();

            $table->integer('paciente_id')->unsigned();
            $table->foreign('paciente_id')->references('id')->on('pacientes')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('valoracion');
    }

}
