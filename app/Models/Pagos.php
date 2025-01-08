<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagos extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'no_pago',
        'no_factura',
        'fecha_pago',
        'valor_pago'
    ];
}
