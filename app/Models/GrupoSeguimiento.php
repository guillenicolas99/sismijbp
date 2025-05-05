<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GrupoSeguimiento extends Model
{
    protected $table = 'grupos_seguimientos';

    protected $fillable = [
        'nombre',
        'fecha',
        'red_id',
    ];

    protected function casts(): array
    {
        return [
            'fecha' => 'date',
        ];
    }

    public function personas_seguimientos()
    {
        return $this->hasMany(PersonaSeguimiento::class);
    }

    public function red()
    {
        return $this->belongsTo(Red::class);
    }
}
