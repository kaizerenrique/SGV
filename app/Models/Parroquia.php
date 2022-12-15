<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parroquia extends Model
{
    use HasFactory;

    protected $fillable = [
        'parroquia'
    ];

    public function municipio()
    {
        return $this->belongsTo(Municipio::class);
    }

    //comunas registradas por parroquia 
    public function comunas()
    {
        return $this->hasMany(Comuna::class);
    }

    //consejos comunales por parroquia
    public function consejoscomunales()
    {
        return $this->hasMany(ConsejoComunal::class);
    }
}
