<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recepcionista extends Model
{
     protected $table = "recepcionistas";
    protected $fillable = ['persona_id', 'descripcion', 'color'];


    public function persona() {
        return $this->belongsTo('App\Persona');
    }
}
