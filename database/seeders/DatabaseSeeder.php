<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Cria categorias básicas
        $this->call(CategoriaSeeder::class);

        // Cria admin e alguns locatários
        $this->call(UsersSeeder::class);

        // Cria equipamentos iniciais
        $this->call(EquipamentoSeeder::class);
    }
}
