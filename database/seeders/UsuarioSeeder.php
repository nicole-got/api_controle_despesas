<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    public function run()
    {
        \App\Models\Usuario::create([
            'nome'      => 'Usuário API',
            'email'     => 'api@controledespesa.com',
            'password'  => Hash::make('usuarioApi2023')
        ]);
    }
}
