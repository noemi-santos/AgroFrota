<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipamento;
use App\Models\Categoria;

class BuscarController extends Controller
{
    public function index(Request $request)
    {
        $query = Equipamento::query();
        $categorias = Categoria::all();
        $layout = (auth()->check() && auth()->user()->access === 'ADM') ? 'layouts.admin' : 'layouts.default';

        // Aplica o filtro de busca se houver termo
        if ($termo = $request->get('termo')) {
            $query->where(function($q) use ($termo) {
                $q->where('nome', 'like', '%' . $termo . '%')
                  ->orWhere('descricao', 'like', '%' . $termo . '%');
            });
        }

        // Filtro por categoria
        if ($categoria = $request->get('categoria')) {
            $query->where('categoria_id', $categoria);
        }

        // Ordenação
        switch($request->get('ordenar')) {
            case 'antigos':
                $query->oldest();
                break;
            case 'preco_asc':
                $query->orderBy('valor', 'asc');
                break;
            case 'preco_desc':
                $query->orderBy('valor', 'desc');
                break;
            default: // recentes
                $query->latest();
        }

        $equipamentos = $query->paginate(9)->withQueryString();
        
        return view('buscar.index', compact('equipamentos', 'categorias'))->with('layout', $layout);
    }
}