<?php

namespace Database\Seeders;

use App\Models\Estado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $estado = new Estado();
        $estado->nombre = 'ABONADO';
        $estado->save();

        $estado = new Estado();
        $estado->nombre = 'PAGADO';
        $estado->save();

        $estado = new Estado();
        $estado->nombre = 'SIN PAGAR';
        $estado->save();
    }
}
