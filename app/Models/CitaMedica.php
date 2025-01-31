<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class CitaMedica extends Model
{
    use HasFactory;

     // Si la tabla se llama exactamente 'citas_medicas':
     protected $table = 'citas_medicas';

    protected $fillable = [
        'fecha',
        'hora',
        'paciente_id',
        'doctor_id',
        'enfermedad_id',
    ];

    public function enfermedad(){

        return $this->BelongsTo(Enfermedad::class,'enfermedad_id');
        
    }

     // Relación con Medicos
     public function medico()
     {
         return $this->belongsTo(Medico::class, 'doctor_id');
     }


    // Relación con pacientes
    public function paciente()
    {
          return $this->belongsTo(Paciente::class, 'paciente_id');
    }




}
