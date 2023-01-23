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
        'observacion',
        'latitud',
        'longitud',
        'direccion_id',
        'consejo_comunal_id'
    ];

    //Direccion donde se ubica la casa
    public function direccion()
    {
        return $this->belongsTo(Direccion::class);
    }

    //consejo comunal
    public function consejocomunal()
    {
        return $this->belongsTo(ConsejoComunal::class, 'consejo_comunal_id');
    }
    
}
