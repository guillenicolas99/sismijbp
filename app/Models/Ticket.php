<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $table = 'tickets';

    protected $fillable = [
        'codigo',
        'abono',
        'precio',
        'descuento',
        'fecha_descuento',
        'estado',
        'evento_id',
        'categoria_id',
        'persona_id',
    ];

    public function evento()
    {
        return $this->belongsTo(Evento::class);
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }
}
