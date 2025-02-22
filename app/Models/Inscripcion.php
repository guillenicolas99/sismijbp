<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    protected $table = 'Inscripciones';

    protected $fillable = [
        'persona_id',
        'escuela_id',
        'asistencias',
        'retiros_completados',
        'invitados',
        'aprobado',
    ];
}
