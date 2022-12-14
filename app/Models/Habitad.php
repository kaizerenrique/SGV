<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habitad extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'habitad',
        'literal',
        'tipo',
        'titularidad',
        'observacion',
        'latitud',
        'longitud',
    ];

    //Direccion donde se ubica la casa
    public function direccion()
    {
        return $this->belongsTo(Direccion::class);
    }
}