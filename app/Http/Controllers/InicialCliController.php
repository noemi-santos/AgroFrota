<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Locacao;
use Illuminate\Support\Facades\Auth;

class InicialCliController extends Controller
{
    public function index(){
        $locacao = Locacao::where('user_id', Auth::id)
            ->where('status', 'aberto')
            ->with('locacao')
            ->first();
        return view('inicial-cli', compact('pedido'));
    }
}
