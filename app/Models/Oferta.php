<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    use HasFactory;

    public function convenios(){
        return $this->belongsTo('App\Models\Convenio','id_convenio');
    }
    public function postulations(){
        return $this->hasMany('App\Models\Postulation');
    }

}
