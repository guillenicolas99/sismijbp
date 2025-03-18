<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discipulado extends Model
{
    protected $table = 'discipulados';
    protected $fillable = [
        'mentor_1_id',
        'mentor_2_id',
        'is_active',
        'red_id',
    ];
    protected $casts = [
        'is_active' => 'boolean', // Opcional, pero recomendado
    ];

    public function personas()
    {
        return $this->hasMany(Persona::class);
    }

    public function red()
    {
        return $this->belongsTo(Red::class);
    }

    public function mentor_1()
    {
        return $this->belongsTo(Persona::class, 'mentor_1_id');
    }

    public function mentor_2()
    {
        return $this->belongsTo(Persona::class, 'mentor_2_id');
    }
}
