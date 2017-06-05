<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model {

    protected $table = "pacientes";
    protected $fillable = ['persona_id', 'descripcion', 'medico_id', 'obrasocial_id'];

    public function obrasocial() {
        return $this->belongsTo('App\ObraSocial');
    }

    public function medico() {
        return $this->belongsTo('App\Medico');
    }

    public function persona() {
        return $this->belongsTo('App\Persona');
    }

}
