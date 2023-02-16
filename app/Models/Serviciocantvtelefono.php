<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serviciocantvtelefono extends Model
{
    use HasFactory;

    protected $fillable = [
        'posee_servicio',
        'codigo_operador',
        'nrotelefono',
        'estado',
    ];

    public function familia()
    {
        return $this->belongsTo(Familia::class);
    }
}
