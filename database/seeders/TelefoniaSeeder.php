<?php

namespace Database\Seeders;

use App\Models\Telefonia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TelefoniaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $telefonia = new Telefonia();
        $telefonia->nombre = 'Tigo';
        $telefonia->save();

        $telefonia = new Telefonia();
        $telefonia->nombre = 'Claro';
        $telefonia->save();
    }
}
