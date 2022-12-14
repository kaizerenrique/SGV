<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsejoComunal extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'rif',
        'codigoSitur',
        'comuna_id',
        'estado_id',
        'municipio_id',
        'parroquia_id',
        'sector',
        'comunidad',
        'direccion',
        'referencia',
        'slug',
        'elegido',
        'vence'
    ];

    //comuna a la que pertenese el consejo comunal
    public function comuna()
    {
        return $this->belongsTo(Comuna::class);
    }
}
