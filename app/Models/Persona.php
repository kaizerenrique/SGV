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

    public function ivss()
    {
        return $this->hasOne(Ivss::class);
    }

    public function telefono()
    {
        return $this->hasOne(Phone::class);
    }
}
