<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clap extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'codigo'
    ];

    //consejo comunal al que pertenece el clap
    public function consejocomunal()
    {
        return $this->belongsTo(ConsejoComunal::class);
    }
}
