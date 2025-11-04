<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        // Admin padrão
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@agrofrota.com',
            'password' => Hash::make('123456'),
            'access' => 'ADM'
        ]);

        // Alguns locatários de exemplo
        $locatarios = [
            [
                'name' => 'João Silva',
                'email' => 'joao@email.com',
                'password' => Hash::make('123456'),
                'access' => 'CLI'
            ],
            [
                'name' => 'Maria Santos',
                'email' => 'maria@email.com',
                'password' => Hash::make('123456'),
                'access' => 'CLI'
            ],
            [
                'name' => 'Pedro Oliveira',
                'email' => 'pedro@email.com',
                'password' => Hash::make('123456'),
                'access' => 'CLI'
            ]
        ];

        foreach ($locatarios as $locatario) {
            User::create($locatario);
        }
    }
}