<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('usuarios')->insert([

            	[ 'nombre' => 'Pedro', 'usuario' => 'juanjo','tipo' => 'ALUMNO', 'password' =>"12345",'created_at' => now(),'updated_at' => now(),],

	[ 'nombre' => 'Juan', 'usuario' => 'GAMJ841',
            'tipo' => 'ALUMNO', // o cualquier valor que se use en tu sistema
            'password' =>"fecha ",
            'created_at' => now(),
            'updated_at' => now(),
        ],



        ]);
    }
}
