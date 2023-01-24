<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Educacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'gradodeintruccion',
        'estudia',
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }
}
