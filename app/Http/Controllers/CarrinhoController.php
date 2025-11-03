<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Equipamento;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Locacao;


class CarrinhoController extends Controller
{
    public function mostrarEquipamento(){
        $equipamento = Equipamento::all();
        return view('welcome', compact('equipamento'));
    }

    public function adicionarCarrinho(int $id){
        $user = Ath::user();
        $equipamento = Equipamento::findOrFail($id);
        $locacao = Locacao::firstOrCreate([
            'user_id' => $user->id,
            'status' => 'aberto'

        ], ['valor_total' => 0]);
        $equipamento = Locacao::where('equipamento_id', $equipamento->id)
                            ->where('equipamento_id', $id)->first();
        if($equipamento){
            $equipamento->quantidade +=1;
            $equipamento->save();
        } else {
            Locacao::create([
                'locacao_id' => $locacao->id,
                'equipamento_id' => $id,
                'quantidade' => 1,
                'valor_total' => $equipamento->preco_periodo

            ]);
        }
        $locacao->valor_total = Locacao::where('locacao_id', $locacao->id)
                                ->sum(DB::raw('quantidade * preco'));
        $locacao->save();
        return redirect('inicial-cli');
    }

    public function removerCarrinho(){

    }

    public function fecharPedido(){

    }
}
