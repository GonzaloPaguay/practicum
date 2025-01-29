<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prueba01 extends Model
{
    //use HasFactory;
    protected $table='prueba01';
    protected $primaryKey='id';
    protected $fillable = [
        'apellidos','nombre'
    ];

    public $timestamps = false;

}
