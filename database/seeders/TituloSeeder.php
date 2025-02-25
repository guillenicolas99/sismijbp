<?php

namespace Database\Seeders;

use App\Models\Titulo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TituloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $titulo = new Titulo();
        $titulo->nombre = 'Miembro';
        $titulo->save();

        $titulo = new Titulo();
        $titulo->nombre = 'Discípulo';
        $titulo->save();

        $titulo = new Titulo();
        $titulo->nombre = 'Líder de casa de paz';
        $titulo->save();

        $titulo = new Titulo();
        $titulo->nombre = 'Líder de discípulos';
        $titulo->save();

        $titulo = new Titulo();
        $titulo->nombre = 'Diácono';
        $titulo->save();

        $titulo = new Titulo();
        $titulo->nombre = 'Anciano';
        $titulo->save();

        $titulo = new Titulo();
        $titulo->nombre = 'Efesio';
        $titulo->save();

        $titulo = new Titulo();
        $titulo->nombre = 'Pastor';
        $titulo->save();

        $titulo = new Titulo();
        $titulo->nombre = 'Profeta';
        $titulo->save();

        $titulo = new Titulo();
        $titulo->nombre = 'Apóstol';
        $titulo->save();
    }
}
