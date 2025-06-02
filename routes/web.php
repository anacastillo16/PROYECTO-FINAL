<?php

use App\Http\Controllers\PublicIndexController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Trabajador\BookController;
use App\Http\Controllers\Trabajador\AuthorController;
use App\Http\Controllers\Trabajador\EditorialController;
use App\Http\Controllers\Usuario\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;
use Illuminate\Support\Facades\Route;

// RUTAS PÚBLICAS
//INDEX PUBLIC
Route::get('/', [PublicIndexController::class, 'index'])->name('index.public');

//LOGIN
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

//REGISTRO
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

// RUTAS PROTEGIDAS
Route::middleware(['auth'])->group(function () {
    //CERRAR SESIÓN
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    //TRABAJADOR
    Route::middleware([AdminMiddleware::class])->group(function () {
        //INDEX 
        Route::get('/indexTRABAJADOR', [BookController::class, 'index'])->name('index.trabajador');

        //BOOKS
        Route::get('trabajador/booksDetails/{id}', [BookController::class, 'show'])->name('trabajador.books.show');
        Route::put('trabajador/editarLibro/{id}', [BookController::class, 'update'])->name('trabajador.books.update');
        Route::post('trabajador/libros', [BookController::class, 'store'])->name('trabajador.books.store');
        Route::delete('trabajador/booksDetails/{id}', [BookController::class, 'destroy'])->name('trabajador.books.destroy');
        
        //AUTORS
        Route::get('trabajador/autores', [AuthorController::class, 'index'])->name('trabajador.autors.index');
        Route::get('trabajador/autorDetails/{id}', [AuthorController::class, 'show'])->name('trabajador.autors.show');
        Route::put('trabajador/editarAutor/{id}', [AuthorController::class, 'update'])->name('trabajador.autors.update');
        Route::post('trabajador/autores', [AuthorController::class, 'store'])->name('trabajador.autors.store');
        Route::delete('trabajador/verAutores/{id}', [AuthorController::class, 'destroy'])->name('trabajador.autors.destroy');

        //EDITORIALS
        Route::get('trabajador/editoriales', [EditorialController::class, 'index'])->name('trabajador.editorials.index');
        Route::get('trabajador/editorialDetails/{id}', [EditorialController::class, 'show'])->name('trabajador.editorials.show');
        Route::put('trabajador/editarEditorial/{id}', [EditorialController::class, 'update'])->name('trabajador.editorials.update');
        Route::post('trabajador/editoriales', [EditorialController::class, 'store'])->name('trabajador.editorials.store');
        Route::delete('trabajador/verEditorials/{id}', [EditorialController::class, 'destroy'])->name( 'trabajador.editorials.destroy');

    });

    //USUARIO
    Route::middleware([UserMiddleware::class])->group(function () {
        //INDEX 
        Route::get('/indexUSUARIO', [UserController::class, 'index'])->name('index.usuario');

        //BOOKS
        Route::get('usuario/booksDetails/{id}', [UserController::class, 'showBook'])->name('usuario.books.show');

        //AUTHORS
        Route::get('usuario/autores', [UserController::class, 'showAutors'])->name('usuario.autors.index');
        Route::get('usuario/autorDetails/{id}', [UserController::class, 'showAutor'])->name('usuario.autors.show');

        //EDITORIALS
        Route::get('usuario/editoriales', [UserController::class, 'showEditorials'])->name('usuario.editorials.index');
        Route::get('usuario/editorialDetails/{id}', [UserController::class, 'showEditorial'])->name('usuario.editorials.show');

        //EDIT PROFILE
        Route::get('usuario/editarPerfil', [UserController::class, 'update'])->name('usuario.update');
    });
});