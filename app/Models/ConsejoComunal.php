<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsejoComunal extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
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

    //clap pertenecientes al consejo comunal
    public function claps()
    {
        return $this->hasMany(Clap::class);
    }

    public function direcciones()
    {
        return $this->hasMany(Direccion::class);
    }

    //geograficos
    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }

    public function municipio()
    {
        return $this->belongsTo(Municipio::class);
    }

    public function parroquia()
    {
        return $this->belongsTo(Parroquia::class);
    }
}
