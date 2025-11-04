<?php

namespace Database\Seeders;

use App\Models\Equipamento;
use App\Models\User;
use App\Models\Categoria;
use Illuminate\Database\Seeder;

class EquipamentoSeeder extends Seeder
{
    public function run(): void
    {
        // Garantir que temos o admin e categorias
        $admin = User::where('email', 'admin@agrofrota.com')->first();
        $categorias = [
            'trator' => Categoria::where('titulo', 'Tratores')->first(),
            'colheitadeira' => Categoria::where('titulo', 'Colheitadeiras')->first(),
            'plantadeira' => Categoria::where('titulo', 'Plantadeiras')->first(),
        ];

        // Lista de equipamentos para seed
        $equipamentos = [
            [
                'nome' => 'Trator John Deere 5090E',
                'marca' => 'John Deere',
                'modelo' => '5090E',
                'ano' => 2022,
                'capacidade' => '90 cv',
                'preco_periodo' => 800.00, // Diária
                'disponibilidade_calendario' => 'Segunda a Sábado',
                'raio_atendimento' => 100, // km
                'exige_operador_certificado' => true,
                'seguro_obrigatorio' => true,
                'caucao_obrigatoria' => true,
                'image_path' => 'images/trator.jpg',
                'categoria_id' => $categorias['trator']->id,
                'locador_id' => $admin->id
            ],
            [
                'nome' => 'Colheitadeira New Holland TC5090',
                'marca' => 'New Holland',
                'modelo' => 'TC5090',
                'ano' => 2021,
                'capacidade' => 'Plataforma 20 pés',
                'preco_periodo' => 1200.00,
                'disponibilidade_calendario' => 'Segunda a Domingo',
                'raio_atendimento' => 150,
                'exige_operador_certificado' => true,
                'seguro_obrigatorio' => true,
                'caucao_obrigatoria' => true,
                'image_path' => 'images/colheitadeira.jpg',
                'categoria_id' => $categorias['colheitadeira']->id,
                'locador_id' => $admin->id
            ],
            [
                'nome' => 'Plantadeira Stara Princesa',
                'marca' => 'Stara',
                'modelo' => 'Princesa',
                'ano' => 2023,
                'capacidade' => '9 linhas',
                'preco_periodo' => 600.00,
                'disponibilidade_calendario' => 'Segunda a Sexta',
                'raio_atendimento' => 80,
                'exige_operador_certificado' => false,
                'seguro_obrigatorio' => true,
                'caucao_obrigatoria' => true,
                'image_path' => 'images/plantadeira.jpg',
                'categoria_id' => $categorias['plantadeira']->id,
                'locador_id' => $admin->id
            ]
        ];

        // Criar cada equipamento
        foreach ($equipamentos as $equip) {
            Equipamento::create($equip);
        }
    }
}