<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    protected $fillable = [
        'descripcion','fecha', 'recurso', 'id_convenio','descripcion_visita','estado','id_asignacion','id_tutor'
    ];
    public function asignaciones(){
        return $this->belongsTo('App\Models\Convenio','id_asignacion');
    }
    public function tutores(){
        return $this->belongsTo('App\Models\User','id_tutor');
    }
}
