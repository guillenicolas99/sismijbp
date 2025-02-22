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
        'red_id',
        'titulo_id',
    ];

    public function red()
    {
        return $this->belongsTo(Red::class, 'idRed');
    }

    public function titulo()
    {
        return $this->belongsTo(Titulo::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
