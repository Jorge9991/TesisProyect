<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convenio extends Model
{
    use HasFactory;

    public function ofertas(){
        return $this->hasMany('App\Models\Oferta');
    }
    public function asignaciones(){
        return $this->hasMany('App\Models\Asignacion');
    }
    public function actividades(){
        return $this->hasMany('App\Models\Activity');
    }
}

