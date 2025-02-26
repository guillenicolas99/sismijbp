<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Red extends Model
{
    use HasFactory;

    protected $table = 'redes';

    protected $fillable = [
        'nombre',
        'is_active',
        'lider_de_red',
    ];

    protected $casts = [
        'fecha' => 'date',
        'is_active' => 'boolean', // Opcional, pero recomendado
    ];

    public function personas()
    {
        return $this->hasMany(Persona::class);
    }
}
