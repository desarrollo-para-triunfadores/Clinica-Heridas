<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turno extends Model {

    protected $table = "turnos";
    protected $fillable = ['fecha', 'estado', 'comentario', 'horario_id', 'paciente_id', 'enfermero_id', 'consultorio_id'];

    public function horario() {
        return $this->belongsTo('App\Horario_atencion');
    }

    public function scopeSearchFecha($query, $fecha) {
        return $query->where('fecha', $fecha);
    }

    public function scopeSearchFechadistinta($query, $fecha) {
        return $query->where('fecha', '<>', $fecha);
    }

    public function scopeSearchPendientes($query) {
        return $query->where('estado', 'pendiente');
    }

    public function scopeSearchEsperando($query) {
        return $query->where('estado', 'esperando');
    }

    public function scopeSearchAtendidos($query) {
        return $query->where('estado', 'atendido');
    }

    public function scopeSearchHorario($query, $id) {
        return $query->where('horario_id', $id);
    }

    public function scopeSearchDistintoEstado($query, $estado) {
        return $query->where('estado', '<>', $estado);
    }

    public function paciente() {
        return $this->belongsTo('App\Paciente');
    }

    public function enfermero() {
        return $this->belongsTo('App\Enfermero');
    }

    public function consultorio() {
        return $this->belongsTo('App\Consultorio');
    }

}
