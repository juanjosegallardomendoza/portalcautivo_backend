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
            'nombre' => 'Juan',
            'usuario' => 'juanjo',
            'tipo' => 'ADMINISTRATIVO', // o cualquier valor que se use en tu sistema
            'password' =>"12345",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
