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
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'id_evento');
    }
}
