<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Book;
use App\Models\Author;

class AuthController extends Controller
{
    public function showLogin() {
        return view ('login');
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email','password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $books = Book::all(); 
            $autores = Author::all();
            if ($user->rol === 'admin') {
                return redirect()->route('index.trabajador');
            } else {
                return view('index.indexUSUARIO', compact('user', 'books', 'autores'));
            }
        }

        return back()->withErrors([
            'email' => 'Las credenciales son incorrectas'
        ]);
    }

    public function indexTrabajador()
    {
        $books = Book::all();
        $autores = Author::all();
        return view('indexTrabajador', compact('books', 'autores'));
    }

    public function showRegisterForm() {
        return view('register'); 
    }

    public function logout() {
        Auth::logout();
        return redirect('/login');
    }

    public function register(Request $request)
{
    // Validación de los datos del formulario
    $request->validate([
        'name' => 'required',
        'lastname' => 'required',
        'email' => 'required|email',
        'password' => 'required',
        'rol' => 'required'
    ]); 

    // Crear el nuevo usuario
    User::create([
        'name' => $request->name,
        'lastname' => $request->lastname,
        'email' => $request->email,
        'password' => Hash::make($request->password), 
        'rol' => 'user', 
    ]);

    return redirect()->route('login')->with('success', 'Cuenta creada exitosamente. Ahora puedes iniciar sesión.');
}
}
