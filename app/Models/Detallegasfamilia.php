<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detallegasfamilia extends Model
{
    use HasFactory;

    protected $fillable = [
        'servicioga_id',
        'proveedoresdeservicio_id',
        'tipobombona',
        'estado',
        'cantidad',
    ];

    public function familia()
    {
        return $this->belongsTo(Familia::class);
    }
    
    public function proveedor()
    {
        return $this->belongsTo(Proveedoresdeservicios::class, 'proveedoresdeservicio_id');
    }
    
}
