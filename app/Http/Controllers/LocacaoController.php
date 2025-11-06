<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Equipamento;
use App\Models\Locacao;
use App\Models\LocatarioDaLocacao;
use Illuminate\Support\Facades\Auth;

class LocacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $locador = Auth::user();
        $locacoes = Locacao::where('created_by', $locador->id)->get();
        $equipamentoIds = $locacoes->pluck('equipamento_id');
        $equipamentos = Equipamento::whereIn('id', $equipamentoIds)->get();
        return view("locacoes.index", compact("locador", 'locacoes', 'equipamentos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        //
        $equipamento = Equipamento::findOrFail($id);
        return view("locacoes.create", compact('equipamento'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Equipamento $equipamento)
    {
        try {
            $data = $request->validate([
                'data_inicio' => ['required', 'date'],
                'data_fim' => ['required', 'date', 'after_or_equal:data_inicio'],
                'tipo_locacao' => ['required', 'boolean'],
            ]);

            $startDate = Carbon::createFromFormat("Y-m-d", $data['data_inicio'])->startOfDay();
            $endDate = Carbon::createFromFormat("Y-m-d", $data['data_fim'])->endOfDay();
            $days = max(1, $startDate->diffInDays($endDate->copy()->startOfDay()) + 1);
            $equipamentoSafe = Equipamento::findOrFail($equipamento->id);
            $valorTotal = $equipamentoSafe->preco_periodo * $days;
            $dataComplete = array_merge(
                $data,
                [
                    'equipamento_id' => $equipamentoSafe->id,
                    'valor_total' => $valorTotal,
                    'created_by' => Auth::user()->id,
                ]
            );
            $locacao = Locacao::create($dataComplete);

            LocatarioDaLocacao::create(
                [
                    'data_inicio' => $dataComplete['data_inicio'],
                    'data_fim' => $dataComplete['data_fim'],
                    'valor_individual' => $dataComplete['valor_total'],
                    'locacao_id' => $locacao->id,
                    'locatario_id' => $dataComplete['created_by'],
                ]
            );

            return redirect()->route("equipamentos.index")
                ->with("sucesso", "Registro inserido!");
        } catch (\Exception $e) {
            echo "Erro ao salvar o registro da locacao! " . $e->getMessage();

        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $locador = Auth::user();
        $locacao = Locacao::findOrFail($id);
        if ($locador->id === $locacao->created_by) {
            $equipamento = Equipamento::findOrFail($locacao->equipamento_id);
            return view("locacoes.show", compact("locador", 'locacao', 'equipamento'));
        }
        return view("locacoes.index");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
