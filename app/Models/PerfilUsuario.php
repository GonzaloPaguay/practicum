<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerfilUsuario extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_usuario',
        'menu',
        'opcion',
        'nombre_opcion',
        'boton'
    ];
}
