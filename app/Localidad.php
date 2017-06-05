<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Localidad extends Model {

    protected $table = "localidades";
    protected $fillable = ['nombre', 'provincia_id', 'cod_postal'];

    public static function localidades($id) {
        return Localidad::where('provincia_id', '=', $id)->get();
    }

    public function provincia() {
        return $this->belongsTo('App\Provincia');
    }

    public function personas() {
        return $this->hasMany('App\Persona');
    }

    public function configuracion() {
        return $this->hasOne('App\Configuracion');
    }

    public function consultorios(){
        return $this->hasMany('App\Consultorios');
    }

}
