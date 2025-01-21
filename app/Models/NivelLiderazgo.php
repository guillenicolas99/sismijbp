<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NivelLiderazgo extends Model
{
    use HasFactory;

    protected $table = 'niveles_liderazgo';

    protected $fillable = [
        'nombre',
    ];

    public function personas()
    {
        return $this->hasMany(Persona::class, 'id_nivel_liderazgo');
    }
}
