<?php

namespace Database\Seeders;

use App\Models\Red;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $red = new Red();
        $red->nombre = 'Emmanuel';
        $red->is_active = true;
        $red->save();

        $red = new Red();
        $red->nombre = 'Adonai';
        $red->is_active = true;
        $red->save();

        $red = new Red();
        $red->nombre = 'El Elyon';
        $red->is_active = true;
        $red->save();

        $red = new Red();
        $red->nombre = 'YAHWEH';
        $red->is_active = true;
        $red->save();

        $red = new Red();
        $red->nombre = 'El Shaddai';
        $red->is_active = true;
        $red->save();
    }
}
