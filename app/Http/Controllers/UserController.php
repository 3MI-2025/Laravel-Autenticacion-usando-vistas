<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function Register(Request $request)
    {
        $user = new User();
        $user -> name = "usuario";
        $user -> email = "usuario@usuario.com";
        $user -> password = Hash::make("12345678");   
        $user -> save();
        return "Creado";

    }

    public function Login(Request $request)
    {
        $credenciales = $request->only('name', 'password');

        if (Auth::attempt($credenciales)) {
            return redirect('/')->with('success', 'Login successful');
        }

        return redirect('/login')->with('error', 'Credenciales incorrectas');
    }

    public function Logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
