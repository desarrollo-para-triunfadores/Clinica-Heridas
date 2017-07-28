<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudio extends Model {

    protected $table = "estudios";
    protected $fillable = [
        'ecografia',
        'eco_doppler',
        'rayos_x',
        'arteriografia',
        'adjunto_arteriografia',
        'resonancia_magnetica',
        'centellograma',
        'cultivo_antibiograma',
        'biopsia',
        'observaciones',
        'paciente_id'
    ];

    public function paciente() {
        return $this->belongsTo('App\Paciente');
    }

}
