<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $table = 'comentarios';

    protected $fillable = [
        'comentario',
        'persona_seguimiento_id',
    ];

    public function personas_seguimientos()
    {
        return $this->belongsTo(PersonaSeguimiento::class);
    }
}
