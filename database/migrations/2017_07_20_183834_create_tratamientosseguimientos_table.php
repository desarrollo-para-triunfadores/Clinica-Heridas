<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTratamientosseguimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tratamientosseguimientos', function (Blueprint $table) {
            $table->increments('id');
                        
            $table->integer('seguimiento_id')->unsigned();
            $table->foreign('seguimiento_id')->references('id')->on('seguimientos')->onDelete('cascade');

            $table->integer('tratamiento_id')->unsigned();
            $table->foreign('tratamiento_id')->references('id')->on('tratamientos')->onDelete('cascade');
            
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
        Schema::dropIfExists('tratamientosseguimientos');
    }
}
