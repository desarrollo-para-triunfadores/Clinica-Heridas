<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $table = "pacientes";
    protected $fillable = ['persona_id', 'descripcion'];


    public function persona() {
        return $this->belongsTo('App\Persona');
    }
}
