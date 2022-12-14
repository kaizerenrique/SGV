<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    use HasFactory;

    protected $fillable = [
        'direccion',
        'codigo',
        'tipo',
        'latitud',
        'longitud',
    ];

    //consejo comunal al que pertenece la direccion
    public function consejocomunal()
    {
        return $this->belongsTo(ConsejoComunal::class);
    }

    //el cap al que pertenece esta direccion
    public function clap()
    {
        return $this->belongsTo(Clap::class);
    }

    public function habitads()
    {
        return $this->hasMany(Habitad::class);
    }
}
