<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        $credenciais = Request::only('email', 'password');
        if (Auth::attempt($credenciais)) {
            return "Usuário " .
                Auth::user()->name
                . " logado com sucesso";
        }
        return "As credencias não são válidas";
    }
}
