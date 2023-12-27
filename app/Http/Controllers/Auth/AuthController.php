<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Professor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;



class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/dashboard');
        } else {
            $errorMessage = 'Credenciais inválidas.';
            return redirect('/')->withErrors([$errorMessage]);
        }
    }
    public function registrar(Request $request)
    {
        $professorExists = Professor::where('email', $request->input('email'))->exists();

        if (!$professorExists) {
            $professor = Professor::create([
                'nome' => $request->input('nome'),
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ]);

            if ($professor) {
                if (Auth::attempt($request->only('email', 'password'))) {
                    Session::flash('register_success', 'Cadastro realizado com sucesso');
                    return redirect('/dashboard');
                }
            }
        } else {
            $errorMessage = 'Email já utilizado, por favor utilize outro.';
            return redirect('/')->withErrors([$errorMessage]);
        }
    }
    public function logout()
    {
        Auth::logout();

        Session::flash('logout_message', 'Você fez logout com sucesso!');

        return redirect()->route('login');
    }
}
