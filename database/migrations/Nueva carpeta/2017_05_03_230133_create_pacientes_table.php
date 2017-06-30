<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacientesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('persona_id')->unsigned();
            $table->foreign('persona_id')->references('id')->on('personas')->onDelete('cascade');
            $table->integer('obrasocial_id')->unsigned();
            $table->foreign('obrasocial_id')->references('id')->on('obras_sociales')->onDelete('cascade');
            $table->integer('medico_id')->unsigned();
            $table->foreign('medico_id')->references('id')->on('medicos')->onDelete('cascade');
            $table->string('descripcion', 500)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('pacientes');
    }

}
