<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->nivel == "ADM") {
            return redirect()->intended("/home-adm");
        } elseif ($user->nivel == "CLI") {
            return redirect()->intended("/home-cli");
        }
    }
}