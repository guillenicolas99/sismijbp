<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RetiroAsistido extends Model
{
    protected $table = 'retiros_asistidos';

    protected $fillable = [
        'persona_id',
        'retiro_id',
        'retiro_idfecha',
    ];
}
