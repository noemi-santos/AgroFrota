<?php

namespace App\Http\Controllers;

use App\Models\LocatarioDaLocacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\Locacao;
use App\Models\Avaliacao;
use App\Models\Equipamento;
class AvaliacaoController extends Controller
{
    public function Create($id)
    {
        $locacao = Locacao::findOrFail($id);
        $equipamento = Equipamento::findOrFail($locacao->equipamento_id);
        return view("locacoes.avaliacoes.create", compact('locacao', 'equipamento'));
    }

    public function Store(Request $request)
    {
        try {
            $data = array_merge(
                $request->all(),
                [
                    'locacao_id' => $request->id,
                    'locatariodalocacao_id' => LocatarioDaLocacao::where('locatario_id', Auth::user()->id)->where('locacao_id', $request->id)->value('id'),
                ]
            );
            $avaliacao = Avaliacao::create($data);
            return redirect()->route("locacoes.index")
                ->with("sucesso", "Registro inserido!");
        } catch (\Exception $e) {
            Log::error("Erro ao salvar o registro da avaliacao! " . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);
            return redirect()->route("locacoes.index")
                ->with("erro", "Erro ao inserir!" . $e->getMessage());
        }
    }


    public function Show(string $id)
    {
        //
    }


    public function Edit(string $id)
    {
        //
    }

    public function Update(Request $request, string $id)
    {
        //
    }


    public function Destroy(string $id)
    {
        //
    }
}
