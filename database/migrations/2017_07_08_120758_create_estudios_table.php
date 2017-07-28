<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudiosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('estudios', function (Blueprint $table) {
            $table->increments('id');

            $table->boolean('ecografia')->nullable();
            $table->boolean('eco_doppler')->nullable();
            $table->boolean('rayos_x')->nullable();
            $table->boolean('arteriografia')->nullable();
            $table->boolean('adjunto_arteriografia')->nullable();

            $table->boolean('resonancia_magnetica')->nullable();
            $table->boolean('centellograma')->nullable();

            $table->boolean('cultivo_antibiograma')->nullable();
            $table->boolean('biopsia')->nullable();

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
        Schema::dropIfExists('estudios');
    }

}
