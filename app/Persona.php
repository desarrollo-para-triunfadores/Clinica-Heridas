<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model {

    protected $table = "personas";
    protected $fillable = ['nombre', 'apellido', 'dni', 'fecha_nac', 'telefono', 'telefono_contacto', 'descripcion', 'email', 'localidad_id', 'direccion', 'pais_id', 'foto_perfil'];

    public function paciente() {
        return $this->hasOne('App\Paciente');
    }

    public function enfermero() {
        return $this->hasOne('App\Enfermero');
    }

    public function recepcionista() {
        return $this->hasOne('App\Recepcionista');
    }

    public function localidad() {
        return $this->belongsTo('App\Localidad');
    }

    public function nacionalidad() {
        return $this->belongsTo('App\Pais');
    }

}
