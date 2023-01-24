<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salud extends Model
{
    use HasFactory;

    protected $fillable = [
        'gestacion',
        'esterilizacion',
        'enfermedadcronica',
        'atencionmedica',
        'quirurgica',
        'tipoquirurgica'
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }
}
