<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeguimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seguimientos', function (Blueprint $table) {
            $table->increments('id');
            
               
            $table->enum('grado', ['1', '2', '3', '4', '5']);
            $table->enum('dimesion', ['0-4 cm°', '4-16 cm°', '16-36 cm°', '36-64 cm°', '64-100 cm°', 'mayor a 100 cm°']);
            $table->enum('profundidad', ['Cicatrizada', 'Epidermis-Dermis', 'Hipodermis', 'Músculo', 'Hueso/Tejido anexo']);
            $table->enum('bordes', ['No distinguible', 'Difuso', 'Delimitados', 'Dañados', 'Engrosado']);
            $table->enum('tipotejido', ['Cicatrización', 'Epitelial', 'Granulación', 'Necrótico y/o Esfacelo', 'Necrótico']);
            $table->enum('exudado', ['Húmedo', 'Mojado', 'Saturado', 'Con Fuga', 'Seco']);
            $table->enum('edema', ['Ausente', '+', '++', '+++', '++++']);
            $table->enum('dolor', ['0-1', '2-3', '4-5', '6-7', '9-10']);
            $table->enum('pielcircundante', ['Sana', 'Descamada', 'Eritematosa', 'Macerada', 'Gangrenosa']);


            $table->string('observacion', 500)->nullable();

            $table->integer('valoracion_id')->unsigned();
            $table->foreign('valoracion_id')->references('id')->on('valoraciones')->onDelete('cascade');

            
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
        Schema::dropIfExists('seguimientos');
    }
}
