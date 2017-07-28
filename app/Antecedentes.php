<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Antecedentes extends Model {

    protected $table = "antecedentes";
    protected $fillable = [
        'diabetes',
        'tipo_diabetes',
        'medicacion_dbt2',
        'tiempo_dbt',
        'acv',
        'tiempo_acv',
        'insuficiencia_cardiaca',
        'insuficiencia_renal',
        'hemodialisis',
        'tiempo_hemodialisis',
        'insuficiencia_venosa',
        'tratamiento_insuficiencia_venosa',
        'tipo_tratamiento_insuficiencia_venosa',
        'arteriopatia_periferica',
        'tratamiento_arteriopatia_periferica',
        'tipo_tratamiento_arteriopatia_periferica',
        'neuropatia',
        'hipertension',
        'tratamiento_hipertension',
        'tvp',
        'tiempo_tvp',
        'observaciones',
        'paciente_id'
    ];

    public function paciente() {
        return $this->belongsTo('App\Paciente');
    }

}
