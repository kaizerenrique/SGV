<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedoresdeservicios extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
    ];

    public function servicios()
    {
        return $this->belongsTo(Servicios::class);
    }
}
