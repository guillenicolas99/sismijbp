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

    protected function casts(): array
    {
        return [
            'asistio' => 'boolean',
            'fecha' => 'date',
            'grupo_id' => 'integer',
            'persona_id' => 'integer',
        ];
    }
}
