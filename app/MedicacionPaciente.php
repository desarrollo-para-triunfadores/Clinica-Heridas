<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicacionPaciente extends Model {

    protected $table = "medicacion";
    protected $fillable = ['paciente_id', 'medicamento_id', 'observaciones'];

    public function paciente() {
        return $this->belongsTo('App\Paciente');
    }

    public function medicamento() {
        return $this->belongsTo('App\Medicamento');
    }

}
