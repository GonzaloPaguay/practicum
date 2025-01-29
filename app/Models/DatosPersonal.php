<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class DatosPersonal extends Model
{
    use HasFactory;

     // Si la tabla se llama exactamente 'citas_medicas':
     protected $table = 'datos_personales';

    protected $fillable = [
    
        'id',
        'apellidos',
        'nombres',
        'ci',
        'telefono_domicilio',
        'telefono_trabajo',
        'telefono_celular',
        'direccion',
        'sexo',
        'estado_civil',
        'id_user',


    ];

    public function users(){

        return $this->belongsTo(User::class,'id_user');
        
    }

    
}