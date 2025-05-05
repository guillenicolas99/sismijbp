<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Telefonia extends Model
{
    protected $table = 'telefonias';

    protected $fillable = [
        'nombre',
    ];

    public function personas_seguimientos()
    {
        return $this->hasMany(PersonaSeguimiento::class);
    }

    public function personas()
    {
        return $this->hasMany(Persona::class);
    }
}
