<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Red extends Model
{
    use HasFactory;

    protected $table = 'redes';

    protected $fillable = [
        'nombre',
    ];

    public function personas()
    {
        return $this->hasMany(Persona::class, 'id_red');
    }
}
