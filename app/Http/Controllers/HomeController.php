<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Anuncio;
use App\Models\Categoria;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->access == "ADM") {
            return redirect()->intended("/");
        } elseif ($user->access == "CLI") {
            return redirect()->intended("/");
        }
    }

    public function indexPublic(Request $request)
    {
        $query = Anuncio::with([
            'equipamento',
            'equipamento.categoria',
            'equipamento.locador',
            'user'
        ]);

        // Filtros
        $termo = $request->query('termo');
        $categoria = $request->query('categoria');

        // Filtro por termo (nome ou região)
        if (!empty($termo)) {
            $query->where(function ($q) use ($termo) {
                $q->where('nome', 'like', "%{$termo}%")
                    ->orWhere('regiao', 'like', "%{$termo}%");
            });
        }

        // Filtro por categoria
        if (!empty($categoria)) {
            $query->whereHas('equipamento.categoria', function ($q) use ($categoria) {
                $q->where('id', $categoria);
            });
        }

        // Consulta final
        $anuncios = $query->latest()->get();
        $categorias = Categoria::all();

        // Layout dinâmico (ADM ou padrão)
        $layout = (auth()->check() && auth()->user()->access === 'ADM')
            ? 'layouts.admin'
            : 'layouts.default';

        return view('anuncios.index', compact('anuncios', 'categorias', 'layout'));

    }
}