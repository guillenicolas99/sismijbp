<?php

namespace Database\Seeders;

use App\Models\Persona;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $persona = new Persona();
        $persona->nombre = 'Milagros Pérez';
        $persona->genero = 'F';
        $persona->telefono = '1123456789';
        $persona->cedula = '000-000000-0000A';
        $persona->is_active = true;
        $persona->save();

        $persona = new Persona();
        $persona->nombre = 'Sandra Castillo';
        $persona->genero = 'F';
        $persona->telefono = '2123456789';
        $persona->cedula = '111-000000-0000A';
        $persona->is_active = true;
        $persona->save();

        $persona = new Persona();
        $persona->nombre = 'Esmirna Melendez';
        $persona->genero = 'F';
        $persona->telefono = '3123456789';
        $persona->cedula = '222-000000-0000A';
        $persona->is_active = true;
        $persona->save();

        $persona = new Persona();
        $persona->nombre = 'Milagros Guitiérrez';
        $persona->genero = 'F';
        $persona->telefono = '51123456789';
        $persona->cedula = '333-000000-0000A';
        $persona->is_active = true;
        $persona->save();

        $persona = new Persona();
        $persona->nombre = 'Clorinda Zelaya';
        $persona->genero = 'F';
        $persona->telefono = '41123456789';
        $persona->cedula = '444-000000-0000A';
        $persona->is_active = true;
        $persona->save();
    }
}
