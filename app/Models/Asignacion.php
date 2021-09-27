<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignacion extends Model
{
    use HasFactory;
    protected $fillable = [
        'estado','id_estudiante', 'id_docente', 'id_convenio'
    ];
    public function estudiantes(){
        return $this->belongsTo('App\Models\User','id_estudiante');
    }
    public function docentes(){
        return $this->belongsTo('App\Models\User','id_docente');
    }
    public function convenios(){
        return $this->belongsTo('App\Models\Convenio','id_convenio');
    }



}
