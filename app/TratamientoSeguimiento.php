<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TratamientoSeguimiento extends Model {

    protected $table = "tratamientosseguimientos";
    protected $fillable = ['seguimiento_id', 'tratamiento_id'];

    public function seguimiento() {
        return $this->belongsTo('App\Seguimiento');
    }

    public function tratamiento() {
        return $this->belongsTo('App\Tratamiento');
    }

}
