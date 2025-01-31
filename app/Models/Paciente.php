<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Paciente extends Model
{
    use HasFactory;
    protected $table = 'paciente';
    protected $fillable = [
        'id',
        'antecedentes_personales',
        'antecedentes_familiares',
        'habitos',
        'personalidad',
        'condicion'
    ];

    public $timestamps = false;

    public function users(){

        return $this->belongsTo(User::class,'id');
        
    }


     // Relación con citas médicas
     public function citasMedicas()
     {
         return $this->hasMany(CitaMedica::class, 'paciente_id');
     }


}
