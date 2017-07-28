<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complicacion extends Model
{
     protected $table = "complicaciones";
    protected $fillable = ['nombre', 'descripcion', 'estado'];
  
    public function valoraciones() {
        return $this->hasMany('App\Valoracion');
    }
}
