<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Rol extends Authenticatable {

    protected $table = 'roles';
    protected $fillable = ['nombre', 'modulos'];

    public function usuarios(){
        return $this->hasMany('App\User');
    }
}
