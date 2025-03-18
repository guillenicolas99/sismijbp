<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::create([
            'name' => 'Guillermo Nicolás',
            'email' => 'memo@gmail.com',
            'password' => bcrypt('12345678'),
        ])->assignRole('Admin');

        // $user = new User();

        // $user->name = 'Guillermo Nicolás';
        // $user->email  = 'memo@gmail.com';
        // $user->password  = bcrypt('12345678');
        // $user->save();
    }
}
