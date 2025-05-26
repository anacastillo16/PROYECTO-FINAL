<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\EditorialController;

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
Route::get('/booksDetails/{id}', [BookController::class, 'show'])->name('books.show');
Route::put('/editarLibro/{id}', [BookController::class, 'update'])->name('books.update');
Route::post('/libros', [BookController::class, 'store'])->name('books.store');
Route::delete('/booksDetails/{id}', [BookController::class, 'destroy'])->name('books.destroy');

//AUTHORS
Route::get('/autores', [AuthorController::class, 'index'])->name('autors.index');
Route::get('/autorDetails/{id}', [AuthorController::class, 'show'])->name('autors.show');
Route::put('/editarAutor/{id}', [AuthorController::class, 'update'])->name('autors.update');
Route::post('/autores', [AuthorController::class, 'store'])->name('autors.store');
Route::delete('/verAutores/{id}', [AuthorController::class, 'destroy'])->name('autors.destroy');

//EDITORIALS
Route::get('/editoriales', [EditorialController::class, 'index'])->name('editorials.index');
Route::get('/editorialDetails/{id}', [EditorialController::class, 'show'])->name('editorials.show');
Route::put('/editarEditorial/{id}', [EditorialController::class, 'update'])->name('editorials.update');
Route::post('/editoriales', [EditorialController::class, 'store'])->name('editorials.store');
Route::delete('/verEditorials/{id}', [EditorialController::class, 'destroy'])->name(name: 'editorials.destroy');