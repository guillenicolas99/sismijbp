<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    protected $table = 'asistencias';

    protected $fillable = [
        'persona_id',
        'grupo_id',
        'fecha',
        'asistio',
    ];
}
