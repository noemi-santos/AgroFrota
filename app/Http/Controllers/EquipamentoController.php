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
        $categorias = Categoria::all();
        $users = User::all();
        $layout = (auth()->check() && auth()->user()->access === 'ADM') ? 'layouts.admin' : 'layouts.default';
        
        // Se for ADM, vê todos os equipamentos, se não, só os próprios
        if (auth()->user()->access === 'ADM') {
            $equipamentos = Equipamento::all();
        } else {
            $equipamentos = Equipamento::where('locador_id', auth()->user()->id)->get();
        }
        
        return view("equipamentos.index", compact("equipamentos", 'categorias', 'users'))->with('layout', $layout);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        $users = User::all();
        $layout = (auth()->check() && auth()->user()->access === 'ADM') ? 'layouts.admin' : 'layouts.default';
        return view("equipamentos.create", compact('categorias', 'users', 'layout'));
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
        $equipamento = Equipamento::findOrFail($id);
        
        // Verifica se o usuário tem permissão para ver este equipamento
        if (auth()->user()->access !== 'ADM' && $equipamento->locador_id !== auth()->user()->id) {
            return redirect()->route("equipamentos.index")
                ->with("erro", "Você não tem permissão para visualizar este equipamento!");
        }
        
        $categoria = Categoria::findOrFail($equipamento->categoria_id);
        $users = User::findOrFail($equipamento->locador_id);
        $layout = (auth()->check() && auth()->user()->access === 'ADM') ? 'layouts.admin' : 'layouts.default';
        return view("equipamentos.show", compact("equipamento", "categoria", "users", "layout"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $equipamento = Equipamento::findOrFail($id);
        
        // Verifica se o usuário tem permissão para editar este equipamento
        if (auth()->user()->access !== 'ADM' && $equipamento->locador_id !== auth()->user()->id) {
            return redirect()->route("equipamentos.index")
                ->with("erro", "Você não tem permissão para editar este equipamento!");
        }
        
        $categorias = Categoria::all();
        // Se for ADM, vê todos os usuários, se não, só vê ele mesmo
        $users = auth()->user()->access === 'ADM' ? User::all() : User::where('id', auth()->user()->id)->get();
        $layout = (auth()->check() && auth()->user()->access === 'ADM') ? 'layouts.admin' : 'layouts.default';
        return view("equipamentos.edit", compact("equipamento", "categorias", "users", "layout"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $equipamento = Equipamento::findOrFail($id);
            
            // Verifica se o usuário tem permissão para atualizar este equipamento
            if (auth()->user()->access !== 'ADM' && $equipamento->locador_id !== auth()->user()->id) {
                return redirect()->route("equipamentos.index")
                    ->with("erro", "Você não tem permissão para alterar este equipamento!");
            }
            
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
        try {
            $equipamento = Equipamento::findOrFail($id);
            
            // Verifica se o usuário tem permissão para excluir este equipamento
            if (auth()->user()->access !== 'ADM' && $equipamento->locador_id !== auth()->user()->id) {
                return redirect()->route("equipamentos.index")
                    ->with("erro", "Você não tem permissão para excluir este equipamento!");
            }
            
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
