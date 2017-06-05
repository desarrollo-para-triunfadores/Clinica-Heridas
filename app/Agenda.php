<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model {

    protected $table = "agendas";
    protected $fillable = ['hora_inicio', 'hora_fin', 'turno', 'cupo_turnos',
                            'lunes','martes','miercoles','jueves','viernes','sabado','domingo'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
