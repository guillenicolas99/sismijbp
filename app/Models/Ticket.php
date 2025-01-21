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
        'id_evento',
        'id_categoria',
        'id_persona',
    ];

    public function evento()
    {
        return $this->belongsTo(Evento::class, 'id_evento');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'id_persona');
    }
}
