<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consultorio extends Model {

    protected $table = "consultorios";
    protected $fillable = ['nombre', 'localidad_id', 'descripcion'];

    public function localidad(){
        return $this->belongsTo('App\Localidad');
    }
}
