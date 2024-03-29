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

    //informacion electoral
    public function cne()
    {
        return $this->hasOne(Cne::class);
    }

    //ivss informacion de pension y registro
    public function ivss()
    {
        return $this->hasOne(Ivss::class);
    }

    //numero de telefono celular
    public function telefono()
    {
        return $this->hasOne(Phone::class);
    }

    //familia a la que pertenece
    public function familia()
    {
        return $this->belongsTo(Familia::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function datospatria()
    {
        return $this->hasOne(Carnetdelapatria::class);
    }

    public function educacion()
    {
        return $this->hasOne(Educacion::class);
    }

    public function laboral()
    {
        return $this->hasOne(Laboral::class);
    }

    public function discapacidad()
    {
        return $this->hasOne(Discapacidad::class);
    }

    public function salud()
    {
        return $this->hasOne(Salud::class);
    }



}
