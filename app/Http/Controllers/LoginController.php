<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function create(): View
    {
        return View('login.create');
    }

    public function login(Request $request)
    {   
        if (!Auth::attempt($request->only(['email', 'password']))) {
            return \redirect()->back()->withErrors('Credenciais Incorretas');
        }

        return \redirect('/series');
    }
}
