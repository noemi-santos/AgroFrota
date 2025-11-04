<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anuncio;
use App\Models\Equipamento;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class AnuncioController extends Controller
{
    /**
     * Show create form for Anuncio with equipamentos list
     */
    public function create()
    {
        // Busca equipamentos ordenados por nome
        $equipamentos = Equipamento::orderBy('nome')
            ->with(['categoria', 'locador']) // Carrega relacionamentos
            ->get();
        
        return view('anuncios.create', compact('equipamentos'));
    }

    /**
     * Store a newly created Anuncio with file upload
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'equipamento_id' => 'required|exists:equipamento,id',
            'valor_diaria' => 'required|numeric|min:0',
            'regiao' => 'required|string|max:255'
        ]);

        try {
            // Adiciona user_id e cria o anúncio
            $data['user_id'] = auth()->id();
            Anuncio::create($data);

            return redirect()->back()->with('sucesso', 'Anúncio criado com sucesso!');
        } catch (\Exception $e) {
            Log::error('Erro ao salvar Anuncio: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'data' => $data
            ]);
            return redirect()->back()->with('erro', 'Erro ao criar anúncio');
        }
    }
}
