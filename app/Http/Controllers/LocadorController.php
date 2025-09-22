<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Locador;

class LocadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $locador = Locador::all();
        return view("locador.index", compact("locador"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $locador = Locador::all();
        return view("locador.create", compact('locador'));
    }
        //
    public function store(Request $request)
    {
        try {
            $requestData = $request->all();

            // Hash da senha
            $requestData['senha'] = bcrypt($request->senha);

            // Força o valor para boolean (1 ou 0)
            $requestData['documentos_validados'] = $request->has('documentos_validados') ? 1 : 0;

            // Criar registro no banco
            Locador::create($requestData);

            return redirect()->route("locador.index")
                ->with("sucesso", "Registro inserido!");
        } catch (\Exception $e) {
            Log::error("Erro ao salvar o registro do locador! " . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);

            return redirect()->route("locador.index")
                ->with("erro", "Erro ao inserir!");
        }

    }
            /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $locador = Locador::findOrFail($id);
        return view("locador.show", compact("locador"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $locador = Locador::findOrFail($id);
        return view("locador.edit", compact("locador"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try {
            $locador = Locador::findOrFail($id);
            $locador->update($request->all());
            return redirect()->route("locador.index")
                ->with("sucesso", "Registro alterado!");
        } catch (\Exception $e) {
            Log::error("Erro ao alterar o registro do locador! " . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);
            return redirect()->route("locador.index")
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
            $locador = Locador::findOrFail($id);
            $locador->delete();
            return redirect()->route("locador.index")
                ->with("sucesso", "Registro excluído!");
        } catch (\Exception $e) {
            Log::error("Erro ao excluir o registro do locador! " . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'id' => $id
            ]);
            return redirect()->route("locador.index")
                ->with("erro", "Erro ao excluir!");
        }
    }
}