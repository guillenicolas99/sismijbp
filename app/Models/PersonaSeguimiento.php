<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonaSeguimiento extends Model
{
    protected $table = 'personas_seguimientos';

    protected $fillable = [
        'nombres',
        'apellidos',
        'telefono',
        'fecha',
        'edad',
        'genero',
        'direccion',
        'correo',
        'is_active',
        'is_baptized',
        'is_call_answer',
        'is_current_visitor',
        'is_in_cpz',
        'is_back_to_church',
        'had_number',
        'is_phone_on',
        'is_from_other_church',
        'other',
        'telefonia_id',
        'consolidador_id',
        'grupo_seguimiento_id'
    ];

    protected function casts(): array
    {
        return [
            'fecha' => 'date',
            'is_active' => 'boolean',
            'is_baptized' => 'boolean',
            'is_current_visitor' => 'boolean',
            'is_from_other_church' => 'boolean',
            'is_in_cpz' => 'boolean',
            'is_phone_on' => 'boolean',
            'is_back_to_church' => 'boolean',
            'had_number' => 'boolean',
            'is_call_answer' => 'boolean',
            'other' => 'boolean',
        ];
    }

    public function consolidador()
    {
        return $this->belongsTo(Persona::class);
    }

    public function telefonia()
    {
        return $this->belongsTo(Telefonia::class);
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }
}
