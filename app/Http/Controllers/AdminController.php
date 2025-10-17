<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    //




    public function index()
    {
        //
        $categorias = Categoria::all();
        return view("categorias.index", compact("categorias"));
    }

    public function edit(string $id)
    {
        //
        $user = User::findOrFail($id);
        return view("users.edit", compact("user"));
    }

    public function update(Request $request, string $id)
    {
        //
        try {
            $user = User::findOrFail($id);
            $user->update($request->all());
            return redirect()->route("users.index")
                ->with("sucesso", "Registro alterado!");
        } catch (\Exception $e) {
            Log::error("Erro ao alterar o registro do usuario! " . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);
            return redirect()->route("users.index")
                ->with("erro", "Erro ao alterar!");
        }
    }

}
