<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FactorRiesgo extends Model {

    protected $table = "factores_riesgo";
    protected $fillable = ['nombre', 'descripcion'];

    public function pacientes() {
        return $this->hasMany('App\Paciente');
    }
}
