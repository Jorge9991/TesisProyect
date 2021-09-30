<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public function postulations(){
        return $this->hasMany('App\Models\Postulation');
    }
    public function asignaciones(){
        return $this->hasMany('App\Models\Asignacion');
    }
    public function actividades(){
        return $this->hasMany('App\Models\Activity');
    }
    public function informaciones(){
        return $this->hasMany('App\Models\Information');
    }
    public function informe(){
        return $this->hasMany('App\Models\InformeFinal');
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','cedula', 'email', 'password','tipo_usuario'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
