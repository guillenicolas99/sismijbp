<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Retiro extends Model
{
    protected $table = 'retiros';

    protected $fillable = [
        'nombre',
        'fecha',
        'descripcion',
        'escuela_id'
    ];

    public function escuela()
    {
        return $this->belongsTo(Escuela::class);
    }
}
