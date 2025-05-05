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
        'image_path',
        'fecha',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'fecha' => 'date',
        ];
    }


    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
