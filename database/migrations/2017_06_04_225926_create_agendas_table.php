<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgendasTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('agendas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hora_inicio');
            $table->string('hora_fin');
            $table->string('turno');
            $table->integer('cupo_turnos');
            $table->booblean('lunes');
            $table->booblean('martes');
            $table->booblean('miercoles');
            $table->booblean('jueves');
            $table->booblean('viernes');
            $table->booblean('sabado');
            $table->booblean('domingo');

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
