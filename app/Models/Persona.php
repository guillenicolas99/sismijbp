<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $table = 'personas';

    protected $fillable = [
        'nombre',
        'genero',
        'telefono',
        'cedula',
        'is_active',
        'red_id',
        'titulo_id'
    ];

    public function red()
    {
        return $this->belongsTo(Red::class);
    }

    public function titulo()
    {
        return $this->belongsTo(Titulo::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function grupos()
    {
        return $this->belongsToMany(Grupo::class, 'grupo_persona');
    }

    public function asistencias()
    {
        return $this->hasMany(Asistencia::class);
    }

    public function invitados()
    {
        return $this->hasMany(Invitado::class);
    }

    public function retirosAsistidos()
    {
        return $this->hasMany(RetiroAsistido::class);
    }
}
