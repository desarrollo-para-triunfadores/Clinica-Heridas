<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seguimiento extends Model
{
    protected $table = "seguimientos";
    protected $fillable = [
        'grado',
        'dimesion',
        'profundidad',
        'bordes',
        'tipotejido',
        'exudado',
        'edema',
        'dolor',
        'pielcircundante',
        'observacion', 
        'valoracion_id'];
  
    public function tratamientos_seguimientos() {
        return $this->hasMany('App\TratamientoSeguimiento');
    }

    public function valoracion() {
        return $this->belongsTo('App\Valoracion');
    }
}
