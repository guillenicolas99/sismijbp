<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invitado extends Model
{
    protected $table = 'invitados';

    protected $fillable = [
        'persona_id',
        'nombre_invitado',
    ];
}
