<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $table = 'grupos';

    protected $fillable = [
        'codigo',
        'fecha_inicio',
        'fecha_fin',
        'is_active',
        'escuela_id',
    ];

    public function escuela()
    {
        return $this->belongsTo(Escuela::class);
    }

    public function personas()
    {
        return $this->belongsToMany(Persona::class, 'grupo_persona');
    }

}
