<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model {

    protected $table = "medicamentos";
    protected $fillable = ['nombre_comercial', 'nombre_droga', 'descripcion'];

    public function medicacion_paciente() {
        return $this->hasMany('App\MedicacionPaciente');
    }

}
