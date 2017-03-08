<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $table="pacientes";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cedula', 'nombre', 'telefono', 'direccion', 'sexo', 'tipo_sangre', 'RH'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    public function getSexoTAttribute(){

        if ($this->sexo==="M"){
            return "Mujer";
        }elseif ($this->sexo==='H'){
            return "Hombre";
        }
    }
}
