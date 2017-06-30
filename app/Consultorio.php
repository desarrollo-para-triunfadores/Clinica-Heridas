<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consultorio extends Model {

    protected $table = "consultorios";
    protected $fillable = ['nombre', 'descripcion'];

    public function localidad() {
        return $this->belongsTo('App\Localidad');
    }

    public function turnos() {
        return $this->hasMany('App\Turno');
    }

}
