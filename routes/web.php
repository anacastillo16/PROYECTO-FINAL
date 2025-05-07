<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('welcome');
});

//LOGIN
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//REGISTRO
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

//INDEX
Route::get('/indexTRABAJADOR', [BookController::class, 'index'])->name('index.trabajador');
Route::get('/indexUSUARIO', function () {
    $user = Auth::user();
    if ($user && $user->rol === 'user') {
        return view('indexUSUARIO', compact('user'));
    }
    return redirect('/login'); // Redirige al login si no es usuario
});

//BOOKS
Route::resource('/books', BookController::class);
