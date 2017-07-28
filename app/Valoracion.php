<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Valoracion extends Model {

    protected $table = "valoraciones";
    protected $fillable = [
        'diagnostico',
        'fecha',
        'desencadenante',
        'complicacion_id',
        'factoresriesgo',
        'signossintomas',
        'observaciones',
        'paciente_id'
    ];

    public function seguimientos() {
        return $this->hasMany('App\Seguimiento');
    }

    public function complicacion() {
        return $this->belongsTo('App\Complicacion');
    }

    public function paciente() {
        return $this->belongsTo('App\Paciente');
    }

}
