<!--
 public function Login(Request $request)
    {
        $credentials = $request->only("email", "password");
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route("home");
        } else {
            return redirect()->route("login")->with("erro", "credenciais invalidas");
        }
    }
-->
@extends('layout')

@section('conteudo')

    <h1>Login</h1>
    <form method="post" action="">
        @CSRF

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input placeholder="email@email.com" type="text" id="email" name="email" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input placeholder="123 é uma ótima senha!" type="password" id="password" name="password" class="form-control" required="">
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

@endsection