<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model {

    protected $table = "medicos";
    protected $fillable = ['nombre', 'descripcion'];

    public function pacientes() {
        return $this->hasMany('App\Paciente');
    }

}
