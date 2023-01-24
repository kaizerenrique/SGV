<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carnetdelapatria extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'serial',
        'hogarespatria',
        'integrantes',
        'partohumanizado',
        'lactanciamaterna',
        'mjgh',
        'amormayor'
    ];
}
