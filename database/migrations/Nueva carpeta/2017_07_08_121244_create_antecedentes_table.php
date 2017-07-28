<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAntecedentesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('antecedentes', function (Blueprint $table) {
            $table->increments('id');

            $table->boolean('diabetes')->nullable();
            $table->enum('tipo_diabetes', ['tipo 1', 'tipo 2'])->nullable();
            $table->enum('medicacion_dbt2', ['comprimidos', 'comprimidos e insulina', 'insulina'])->nullable();
            $table->string('tiempo_dbt')->nullable();

            $table->boolean('acv')->nullable();
            $table->string('tiempo_acv')->nullable();

            $table->boolean('insuficiencia_cardiaca')->nullable();
            $table->boolean('insuficiencia_renal')->nullable();
            $table->boolean('hemodialisis')->nullable();
            $table->string('tiempo_hemodialisis')->nullable();
            $table->boolean('insuficiencia_venosa')->nullable();
            $table->boolean('tratamiento_insuficiencia_venosa')->nullable();
            $table->enum('tipo_tratamiento_insuficiencia_venosa', ['drogas', 'cirugía'])->nullable();

            $table->boolean('arteriopatía_periferica')->nullable();
            $table->boolean('tratamiento_arteriopatía_periferica')->nullable();
            $table->enum('tipo_tratamiento_arteriopatía_periferica', ['by pass', 'angioplastía', 'prostaglandía'])->nullable();
            $table->boolean('neuropatia')->nullable();

            $table->boolean('hipertension')->nullable();
            $table->boolean('tratamiento_hipertension')->nullable();

            $table->boolean('tvp')->nullable();
            $table->string('tiempo_tvp')->nullable();

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
        Schema::dropIfExists('antecedentes');
    }

}
