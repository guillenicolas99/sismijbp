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
        'estado_id',
        'evento_id',
        'categoria_id',
        'persona_id',
    ];
    protected function casts(): array
    {
        return [
            'fecha_descuento' => 'date',
            'estado_id' => 'integer',
            'evento_id' => 'integer',
            'categoria_id' => 'integer',
            'persona_id' => 'integer',
        ];
    }

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

    public function observaciones()
    {
        return $this->hasMany(Observacion::class);
    }
}
