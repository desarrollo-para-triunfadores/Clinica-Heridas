<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model {

    protected $table = "personas";
    protected $fillable = ['nombre', 'apellido', 'dni', 'fecha_nac', 'telefono', 'telefono_contacto', 'descripcion', 'email', 'localidad_id', 'direccion'];

    public function propietarios() {
        return $this->hasMany('App\Propietario');
    }

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

}
