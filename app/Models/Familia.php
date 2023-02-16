<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Familia extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'status'
    ];

    //consejo comunal al que pertenece la familia
    public function consejocomunal()
    {
        return $this->belongsTo(ConsejoComunal::class, 'consejo_comunal_id');
    }

    //el cap al que pertenece esta direccion
    public function clap()
    {
        return $this->belongsTo(Clap::class);
    }

    public function habitad()
    {
        return $this->belongsTo(Habitad::class);
    }

    //personas que integran una familia
    public function personas()
    {
        return $this->hasMany(Persona::class);
    }

    //usuario que registra
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function formadetenencia()
    {
        return $this->hasOne(Tenencia::class);
    }

    public function serviciogas()
    {
        return $this->hasOne(Serviciogas::class);
    }

    public function bombonas()
    {
        return $this->hasMany(Detallegasfamilia::class);
    }

    public function cantv()
    {
        return $this->hasMany(Serviciocantvtelefono::class);
    }

}
