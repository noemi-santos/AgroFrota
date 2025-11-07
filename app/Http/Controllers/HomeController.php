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
    
        // se o usúario está logado no admin, vai retornar home-adm.blade.php senão home.public.blade.php
        return view(Auth::user()->access === 'ADM' ? 'home.home-adm' : 'home.public', compact('anuncios'));

    }
}