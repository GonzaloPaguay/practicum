<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prueba02 extends Model
{
    //use HasFactory;
    protected $table='prueba02';
    protected $primaryKey='id';
    protected $fillable = [
        'apellidos','nombre'
    ];

    public $timestamps = false;

}
