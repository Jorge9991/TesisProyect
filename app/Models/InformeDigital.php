<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformeDigital extends Model
{
    use HasFactory;
    protected $fillable = [
        'link','id_estudiante'
    ];
    public function estudiantes(){
        return $this->belongsTo('App\Models\User','id_estudiante');
    }
}
