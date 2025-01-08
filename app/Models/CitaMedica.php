<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CitaMedica extends Model
{
    use HasFactory;

    protected $fillable = [
        'n_hist_clinica',
        'no_citamedica',
        'fecha_cita',
        'motivo',
        'descripcion',
        'tipo_diagnostico',
        'descripcion_diagnostica',
        'tratamiento',
        'estado'
    ];

    
}
