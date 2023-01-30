<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serviciogas extends Model
{
    use HasFactory;

    protected $fillable = [
        'gas_directo',
        'bombonas_gas',
    ];

    public function familia()
    {
        return $this->belongsTo(Familia::class);
    }

    public function bombonas()
    {
        return $this->belongsTo(Detallegasfamilia::class);
    }
}
