<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Escuela extends Model
{
    protected $table = 'escuelas';

    protected $fillable = [
        'codigo',
        'nombre',
        'is_active',
    ];

    public function grupos()
    {
        return $this->hasMany(Grupo::class);
    }
}
