<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoria = new Categoria();
        $categoria->nombre = 'PREMIUM';
        $categoria->save();

        $categoria = new Categoria();
        $categoria->nombre = 'VIP';
        $categoria->save();

        $categoria = new Categoria();
        $categoria->nombre = 'GENERAL';
        $categoria->save();
    }
}
