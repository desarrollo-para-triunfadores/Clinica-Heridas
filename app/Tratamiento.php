<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model {

    protected $table = "tratamientos";
    protected $fillable = ['nombre', 'descripcion', 'estado'];

    public function tratamientos_seguimientos() {
        return $this->hasMany('App\TratamientoSeguimiento');
    }

}
