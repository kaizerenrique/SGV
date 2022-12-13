<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $fillable = [
        'nacionalidad',
        'cedula',
        'nombres',
        'apellidos',
        'fnacimiento',
        'sexo',
        'status',
        'jefedefamilia',
    ];

    public function cne()
    {
        return $this->hasOne(Cne::class);
    }
}