<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FactorPaciente extends Model {

    protected $table = "factorespaciente";
    protected $fillable = ['paciente_id', 'factor_id', 'observaciones'];

    public function paciente() {
        return $this->belongsTo('App\Paciente');
    }

    public function factor() {
         return $this->belongsTo('App\Factor');
    }

}
