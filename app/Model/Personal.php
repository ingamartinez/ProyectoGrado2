<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Personal extends Authenticatable
{
    protected $table = 'personal';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cedula', 'email', 'password','nombre','telefono','sexo','direccion','tipo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
