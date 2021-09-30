<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformeFinal extends Model
{
    use HasFactory;
    protected $fillable = [
        'link','observaciones', 'estado', 'fecha','id_estudiante','id_tutor'
    ];
    public function estudiantes(){
        return $this->belongsTo('App\Models\User','id_estudiante');
    }
    public function tutores(){
        return $this->belongsTo('App\Models\User','id_tutor');
    }
}
