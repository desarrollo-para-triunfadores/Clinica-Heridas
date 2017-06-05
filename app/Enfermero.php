<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enfermero extends Model
{
     protected $table = "enfermeros";
    protected $fillable = ['persona_id', 'descripcion', 'matricula'];


    public function persona() {
        return $this->belongsTo('App\Persona');
    }
}
