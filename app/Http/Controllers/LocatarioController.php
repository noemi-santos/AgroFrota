<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Locatario;

class LocatarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $locatario = Locatario::all();
        return view("locatario.index", compact("locatario"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $locatario = Locatario::all();
        return view("locatario.create", compact('locatario'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
           $requestData = $request->all();

            // Hash da senha
            $requestData['senha'] = bcrypt($request->senha);

            // Criar registro no banco
            Locatario::create($requestData);
            return redirect()->route("locatario.index")
                ->with("sucesso", "Registro inserido!");
        } catch (\Exception $e) {
            Log::error("Erro ao salvar o registro do locatario! " . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);
            return redirect()->route("locatario.index")
                ->with("erro", "Erro ao inserir!");
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $locatario = Locatario::findOrFail($id);
        return view("locatario.show", compact("locatario"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $locatario = Locatario::findOrFail($id);
        return view("locatario.edit", compact("locatario"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try {
            $locatario = Locatario::findOrFail($id);
            $locatario->update($request->all());
            return redirect()->route("locatario.index")
                ->with("sucesso", "Registro alterado!");
        } catch (\Exception $e) {
            Log::error("Erro ao alterar o registro do locatario! " . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);
            return redirect()->route("locatario.index")
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
            $locatario = Locatario::findOrFail($id);
            $locatario->delete();
            return redirect()->route("locatario.index")
                ->with("sucesso", "Registro excluído!");
        } catch (\Exception $e) {
            Log::error("Erro ao excluir o registro do locatario! " . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'id' => $id
            ]);
            return redirect()->route("locatario.index")
                ->with("erro", "Erro ao excluir!");
        }
    }
}