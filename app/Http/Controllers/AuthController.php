<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    //
    public function ShowFormLogin()
    {
        if (Auth::check()) {
            return redirect()->intended(route('home'));
        }
        return view('auth.login');
    }

    public function ShowFormCadastro()
    {
        return view("auth.cadastro");
    }

    public function CadastrarUsuario(Request $request)
    {
        try {
            $dados = $request->all();
            $dados["password"] = Hash::make($dados["password"]);
            User::create($dados);
            return redirect()->route("login")->with("Sucesso", "Novo usuario registrado!");
        } catch (\Exception $e) {
            Log::error(
                "Erro ao criar o usuario: " . $e->getMessage(),
                [
                    "stack" => $e->getTraceAsString(),
                    "request" => $request->all()
                ]
            );
        }
    }

    public function Login(Request $request)
    {
        $credentials = $request->only("email", "password");
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended("/home");

        } else {
            return redirect()->route("login")->with("erro", "credenciais invalidas");
        }
    }

    public function Logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route("login");
    }
}
