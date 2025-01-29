<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Medico extends Model
{
    use HasFactory;
    protected $table = 'medico';
    protected $fillable = [
        'id',
        'licencia',
        'especialidad_id',
    ];

    public $timestamps = false;

    public function users(){

        return $this->belongsTo(User::class,'id');
        
    }


}


