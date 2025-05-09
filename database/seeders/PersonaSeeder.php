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
        $persona->telefono = '12014785';
        $persona->correo = 'milagros@gmail.com';
        $persona->cedula = '000-000000-0000A';
        $persona->is_active = true;
        $persona->red_id = 1;
        $persona->save();

        $persona = new Persona();
        $persona->nombre = 'Sandra Castillo';
        $persona->genero = 'F';
        $persona->telefono = '01232587';
        $persona->correo = 'sandra@gmail.com';
        $persona->cedula = '111-000000-0000A';
        $persona->is_active = true;
        $persona->red_id = 2;
        $persona->save();

        $persona = new Persona();
        $persona->nombre = 'Esmirna Melendez';
        $persona->genero = 'F';
        $persona->telefono = '12013658';
        $persona->correo = 'esmirna@gmail.com';
        $persona->cedula = '222-000000-0000A';
        $persona->is_active = true;
        $persona->red_id = 3;
        $persona->save();

        $persona = new Persona();
        $persona->nombre = 'Milagros Estrada';
        $persona->genero = 'F';
        $persona->telefono = '10123698';
        $persona->correo = 'milagrose@gmail.com';
        $persona->cedula = '205-000000-0000A';
        $persona->is_active = true;
        $persona->red_id = 4;
        $persona->save();

        $persona = new Persona();
        $persona->nombre = 'Clorinda Zelaya';
        $persona->genero = 'F';
        $persona->telefono = '31014785';
        $persona->correo = 'clorinda@gmail.com';
        $persona->cedula = '444-000000-0000A';
        $persona->is_active = true;
        $persona->red_id = 5;
        $persona->save();
    }
}
