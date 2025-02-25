<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $table = 'eventos';

    protected $fillable = [
        'nombre',
        'fecha',
        'is_active',
    ];

    protected $casts = [
        'fecha' => 'date',
        'is_active' => 'boolean', // Opcional, pero recomendado
    ];


    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
