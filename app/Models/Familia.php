<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Familia extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'status'
    ];

    //consejo comunal al que pertenece la familia
    public function consejocomunal()
    {
        return $this->belongsTo(ConsejoComunal::class);
    }

    //el cap al que pertenece esta direccion
    public function clap()
    {
        return $this->belongsTo(Clap::class);
    }

    public function habitad()
    {
        return $this->belongsTo(Habitad::class);
    }

    //personas que integran una familia
    public function personas()
    {
        return $this->hasMany(Persona::class);
    }
}
