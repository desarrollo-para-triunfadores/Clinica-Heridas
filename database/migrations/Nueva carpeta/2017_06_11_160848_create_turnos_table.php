<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTurnosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('turnos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fecha');
            $table->enum('estado', ['pendiente', 'esperando','atendido', 'reprogramado', 'cancelado', 'ausente']);
            $table->string('comentario')->nullable();
            $table->string('hora_llegado')->nullable();
            $table->integer('agenda_id')->unsigned();
            $table->foreign('agenda_id')->references('id')->on('agendas')->onDelete('cascade');
            $table->integer('paciente_id')->unsigned();
            $table->foreign('paciente_id')->references('id')->on('pacientes')->onDelete('cascade');
            $table->integer('enfermero_id')->unsigned()->nullable();
            $table->foreign('enfermero_id')->references('id')->on('enfermeros')->onDelete('cascade');
            $table->integer('consultorio_id')->unsigned()->nullable();
            $table->foreign('consultorio_id')->references('id')->on('consultorios')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('turnos');
    }

}
