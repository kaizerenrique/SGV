<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discapacidad extends Model
{
    use HasFactory;

    protected $fillable = [
        'discapacidad',
        'carnetdiscapacidad',
        'codigocarnetdiscapacidad'
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }
}
