<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Equipamento;
use App\Models\Categoria;
use App\Models\User;

class EquipamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $equipamentos = Equipamento::all();
        $categorias = Categoria::all();
        $locador = User::all();
        $layout = (auth()->check() && auth()->user()->access === 'ADM') ? 'layouts.admin' : 'layouts.default';
        return view("equipamentos.index", compact("equipamentos", 'categorias', 'locador'))->with('layout', $layout);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        // Filtra apenas usuários ADM (locadores)
        $locador = User::where('access', 'ADM')->get();
        return view("equipamentos.create", compact('categorias', 'locador'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->all();
            
            // Se tem foto, faz o upload
            if ($request->hasFile('foto')) {
                $path = $request->file('foto')->store('equipamentos', 'public');
                $data['image_path'] = $path;
            }

            Equipamento::create($data);
            return redirect()->route("equipamentos.index")
                ->with("sucesso", "Registro inserido!");
        } catch (\Exception $e) {
            Log::error("Erro ao salvar o registro do equipamento! " . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);
            return redirect()->route("equipamentos.index")
                ->with("erro", "Erro ao inserir!");
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $equipamento = Equipamento::findOrFail($id);
        $categoria = Categoria::findOrFail($equipamento->categoria_id);
        $locador = User::findOrFail($equipamento->locador_id);
        return view("equipamentos.show", compact("equipamento", "categoria", "locador"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $equipamento = Equipamento::findOrFail($id);
        $categorias = Categoria::all();
        $locador = User::all();
        return view("equipamentos.edit", compact("equipamento", "categorias", "locador"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try {
            $equipamento = Equipamento::findOrFail($id);
            $equipamento->update($request->all());
            return redirect()->route("equipamentos.index")
                ->with("sucesso", "Registro alterado!");
        } catch (\Exception $e) {
            Log::error("Erro ao alterar o registro do equipamento! " . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);
            return redirect()->route("equipamentos.index")
                ->with("erro", "Erro ao alterar!");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            $equipamento = Equipamento::findOrFail($id);
            $equipamento->delete();
            return redirect()->route("equipamentos.index")
                ->with("sucesso", "Registro excluído!");
        } catch (\Exception $e) {
            Log::error("Erro ao excluir o registro do equipamento! " . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'id' => $id
            ]);
            return redirect()->route("equipamentos.index")
                ->with("erro", "Erro ao excluir!");
        }
    }
    
}
