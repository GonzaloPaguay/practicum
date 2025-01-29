<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Especialidad extends Model
{
    use HasFactory;
    protected $table = 'especialidad';
    protected $fillable = [
        'nombre',
        'descripcion',
    ];

   
}
