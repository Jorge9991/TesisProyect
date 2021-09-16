<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postulation extends Model
{
    use HasFactory;
    protected $fillable = [
        'estado','codigo', 'link', 'id_estudiante','id_oferta'
    ];
    public function estudiantes(){
        return $this->belongsTo('App\Models\User','id_estudiante');
    }
    public function ofertas(){
        return $this->belongsTo('App\Models\Oferta','id_oferta');
    }
}
