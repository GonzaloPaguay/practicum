<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'no_factura',
        'no_citamedica',
        'fecha_factura',
        'forma_pago',
        'fecha_vencimiento'
    ];
}

