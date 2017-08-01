<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorariosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('horarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hora_inicio');
            $table->string('hora_fin');
            $table->string('turno')->nullable();
            $table->integer('cupo_turnos');
            $table->boolean('lunes')->nullable();
            $table->boolean('martes')->nullable();
            $table->boolean('miercoles')->nullable();
            $table->boolean('jueves')->nullable();
            $table->boolean('viernes')->nullable();
            $table->boolean('sabado')->nullable();
            $table->boolean('domingo')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('agendas');
    }

}
