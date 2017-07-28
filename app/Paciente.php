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

    public function turnos() {
        return $this->hasMany('App\Turnos');
    }

    public function antecedentes() {
        return $this->hasOne('App\Antecedentes');
    }

    public function factores_paciente() {
        return $this->hasMany('App\FactorPaciente');
    }

    public function medicacionPaciente() {
        return $this->hasMany('App\MedicacionPaciente');
    }

    public function estudios() {
        return $this->hasOne('App\Estudio');
    }

     public function valoraciones() {
        return $this->hasMany('App\Valoracion');
    }
    
}
