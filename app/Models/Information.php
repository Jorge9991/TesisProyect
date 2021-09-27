<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;
    protected $fillable = [
        'fecha','horas_inicio', 'horas_fin', 'descripcion','id_estudiante'
    ];
    public function estudiantes(){
        return $this->belongsTo('App\Models\User','id_estudiante');
    }
}
