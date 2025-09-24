<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Locador;
use Illuminate\Suport\Facades\Log;

class LocadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locadores = Locador::all();
        return view("locadores.index", compact("locadores"));
    }

    /**
     * Show the form for creating a new resource.
     */
    //public function create()
    //{
    //    $categorias = Categoria::all(); //só se tiver chave estrangeira
    //    return view("locadores.create", compact('categorias'));
    //}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            locador::create($request->all());
            return redirect() ->route("locadores.index") ->with ("sucesso", "Registro inserido!");

        } catch(\Exception $e) {
            Log::error("Erro ao salvar o registro do locador! ".$e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);
            return redirect() ->route("locadores.index") -> with("erro", "Erro ao inserir!");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $locador = locador::findOrFail($id);
        return view("locadores.show", compact("locador"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $locador = locador::findOrFail($id);
        //$categorias = Categoria::all();
        //return view("locadores.edit", compact("locador", "categorias"));
        return view("locadores.edit", compact("locador"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $locador = locador::findOrFail($id);
            $locador->update($request->all());
            return redirect() ->route("locadores.index") ->with ("sucesso", "Registro alterado!");

        } catch(\Exception $e) {
            Log::error("Erro ao alterar o registro do locador! ".$e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);
            return redirect() ->route("locadores.index") -> with("erro", "Erro ao alterar!");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         try{
            $locador = locador::findOrFail($id);
            $locador->delete();
            return redirect() ->route("locadores.index") ->with ("sucesso", "Registro excluído!");

        } catch(\Exception $e) {
            Log::error("Erro ao excluir o locador! ".$e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'id' => $id
            ]);
            return redirect() ->route("locadores.index") -> with("erro", "Erro ao excluir!");
        }
    }
}
