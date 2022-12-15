<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comuna extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'codigoSitur',
        'estado_id',
        'municipio_id',
        'parroquia_id',
        'direccion',
        'referencia',
        'slug'
    ];

    //consejos comunales que pertenecen a la comuna
    public function consejoscomunales()
    {
        return $this->hasMany(ConsejoComunal::class);
    }

    public function familias()
    {
        return $this->hasManyThrough(Familia::class, ConsejoComunal::class);
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
