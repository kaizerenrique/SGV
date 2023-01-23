<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    protected $fillable = [
        'estado',
        'iso',
    ];

    public function municipios()
    {
        return $this->hasMany(Municipio::class);
    }

    //comunas registradas por estado 
    public function comunas()
    {
        return $this->hasMany(Comuna::class);
    }

    //consejos comunales por estado
    public function consejoscomunales()
    {
        return $this->hasMany(ConsejoComunal::class);
    }
}
