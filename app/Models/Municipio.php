<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;

    protected $fillable = [
        'municipio'
    ];

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }

    public function paroquias()
    {
        return $this->hasMany(Parroquia::class);
    }

    //comunas registradas por municipio 
    public function comunas()
    {
        return $this->hasMany(Comuna::class);
    }

    //consejos comunales por municipio
    public function consejoscomunales()
    {
        return $this->hasMany(ConsejoComunal::class);
    }
}
