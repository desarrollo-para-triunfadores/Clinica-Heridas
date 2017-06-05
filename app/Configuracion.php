<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuracion extends Model {

    protected $table = "configuraciones";
    protected $fillable = ['nombre', 'logo', 'telefono', 'telefono_contacto', 'descripcion', 'email', 'localidad_id', 'direccion', 'apodo', 'apodo_abreviado'];

    public function localidad() {
        return $this->belongsTo('App\Localidad');
    }

}
