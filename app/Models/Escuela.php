<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Escuela extends Model
{
    protected $table = 'escuelas';

    protected $fillable = [
        'nombre',
        'nivel',
        'descripcion',
        'requisitos',
        'fecha_inicio',
        'fecha_fin',
    ];
}
