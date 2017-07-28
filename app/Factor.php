<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factor extends Model {

    protected $table = "factores";
    protected $fillable = [
        'nombre',
        'observaciones'
    ];

    public function factores_paciente() {
        return $this->hasMany('App\FactoresPaciente');
    }

}
