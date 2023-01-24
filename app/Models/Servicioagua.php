<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicioagua extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanquedeagua',
        'capacidad',
    ];

    public function habitad()
    {
        return $this->belongsTo(Habitad::class);
    }
}
