<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feriado extends Model {

    protected $table = "feriados";
    protected $fillable = ['fecha', 'motivo', 'usuario_id'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
