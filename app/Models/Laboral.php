<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboral extends Model
{
    use HasFactory;

    protected $fillable = [
        'trabaja',
        'condicionlaboral',
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }
}
