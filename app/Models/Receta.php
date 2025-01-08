<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_citamedica',
        'no_receta',
        'cantidad',
        'dosis',
        'iniciar_dosis',
        'indicaciones'
    ];
}
