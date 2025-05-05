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

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public function grupos()
    {
        return $this->hasMany(Grupo::class);
    }
}
