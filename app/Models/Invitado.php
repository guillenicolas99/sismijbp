<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invitado extends Model
{
    protected $table = 'invitados';

    protected $fillable = [
        'inscripcion_id',
        'nombre',
        'telefono',
    ];
}
