<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->access == "ADM") {
            return redirect()->intended("/home-adm");
        } elseif ($user->access == "CLI") {
            return redirect()->intended("/home-cli");
        }
    }
}