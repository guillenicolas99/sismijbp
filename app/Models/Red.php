<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Red extends Model
{
    use HasFactory;

    protected $table = 'redes';

    protected $fillable = [
        'nombre',
        'is_active',
        'lider_de_red_id',
        'lider_de_red_2_id',
    ];

    protected $casts = [
        'fecha' => 'date',
        'is_active' => 'boolean', // Opcional, pero recomendado
    ];

    public function personas()
    {
        return $this->hasMany(Persona::class);
    }

    public function discipulados()
    {
        return $this->hasMany(Discipulado::class);
    }

    public function liderRed1()
    {
        return $this->belongsTo(Persona::class, 'lider_de_red_id');
    }

    public function liderRed2()
    {
        return $this->belongsTo(Persona::class, 'lider_de_red_2_id');
    }
}
