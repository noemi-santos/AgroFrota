<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categorias = Categoria::all();
        return view("categorias.index", compact("categorias"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categorias = Categoria::all();
        return view("categorias.create", compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            Categoria::create($request->all());
            return redirect()->route("categorias.index")
                ->with("sucesso", "Registro inserido!");
        } catch (\Exception $e) {
            Log::error("Erro ao salvar o registro da categoria! " . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);
            return redirect()->route("categorias.index")
                ->with("erro", "Erro ao inserir!");
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $categoria = Categoria::findOrFail($id);
        return view("categorias.show", compact("categoria"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $categoria = Categoria::findOrFail($id);
        return view("categorias.edit", compact("categoria"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try {
            $categoria = Categoria::findOrFail($id);
            $categoria->update($request->all());
            return redirect()->route("categorias.index")
                ->with("sucesso", "Registro alterado!");
        } catch (\Exception $e) {
            Log::error("Erro ao alterar o registro da categoria! " . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);
            return redirect()->route("categorias.index")
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
            $categoria = Categoria::findOrFail($id);
            $categoria->delete();
            return redirect()->route("categorias.index")
                ->with("sucesso", "Registro excluído!");
        } catch (\Exception $e) {
            Log::error("Erro ao excluir o registro da categoria! " . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'id' => $id
            ]);
            return redirect()->route("categorias.index")
                ->with("erro", "Erro ao excluir!");
        }
    }
}
