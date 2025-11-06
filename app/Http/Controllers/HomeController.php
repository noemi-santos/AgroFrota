<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->access == "ADM") {
            return redirect()->intended("/home-adm");
        } elseif ($user->access == "CLI") {
            return redirect()->intended("/home-cli");
        }
    }

    public function indexPublic()
    {
        // Busca anúncios com relacionamentos
        $anuncios = \App\Models\Anuncio::with(['equipamento', 'user'])
            ->orderBy('created_at', 'desc')
            ->get();

        // Escolhe o layout com base no nível de acesso
        $layout = (auth()->check() && auth()->user()->access === 'ADM') ? 'layouts.admin' : 'layouts.default';

        return view('home.public', compact('anuncios'))->with('layout', $layout);
    }
}