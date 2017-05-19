<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model {

    protected $table = "obras_sociales";
    protected $fillable = ['nombre', 'dni', 'descripcion'];

}
