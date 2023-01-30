<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicios extends Model
{
    use HasFactory;

    protected $fillable = [
        'servicio',
        'descrip'
    ];

    public function proveedores()
    {
        return $this->hasMany(Proveedoresdeservicios::class);
    }

}
