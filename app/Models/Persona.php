<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $table = 'personas';

    protected $fillable = [
        'nombre',
        'id_red',
        'id_nivel_liderazgo',
    ];

    public function red()
    {
        return $this->belongsTo(Red::class, 'id_red');
    }

    public function nivelLiderazgo()
    {
        return $this->belongsTo(NivelLiderazgo::class, 'id_nivel_liderazgo');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'id_persona');
    }
}
