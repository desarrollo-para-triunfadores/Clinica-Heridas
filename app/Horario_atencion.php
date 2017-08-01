<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario_atencion extends Model {

    protected $table = "horarios";
    protected $fillable = ['hora_inicio',
        'hora_fin',
        'turno',
        'cupo_turnos',
        'lunes',
        'martes',
        'miercoles',
        'jueves',
        'viernes',
        'sabado',
        'domingo'];

    public function scopeSearchDia($query, $dia) {
        return $query->where($dia, true);
    }

}
