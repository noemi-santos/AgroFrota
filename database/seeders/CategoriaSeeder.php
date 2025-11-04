<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        $categorias = [
            ['titulo' => 'Tratores'],
            ['titulo' => 'Colheitadeiras'],
            ['titulo' => 'Plantadeiras'],
            ['titulo' => 'Implementos'],
            ['titulo' => 'Irrigação'],
            ['titulo' => 'Pulverizadores'],
        ];

        foreach ($categorias as $categoria) {
            Categoria::create($categoria);
        }
    }
}