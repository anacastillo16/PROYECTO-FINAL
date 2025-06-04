<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class FavoritoController extends Controller
{
    // Mostrar todos los favoritos del usuario
    public function index()
    {
        $favoritos = Auth::user()->favoriteBooks()->paginate(10);
        return view('usuario.favoritos', compact('favoritos'));
    }

    // Añadir un libro a favoritos
    public function store(Book $book)
    {
        $user = Auth::user();

        if (!$user->favoriteBooks->contains($book->id)) {
            $user->favoriteBooks()->attach($book->id);
        }

        return back();
    }

    // Quitar un libro de favoritos
    public function destroy(Book $book)
    {
        Auth::user()->favoriteBooks()->detach($book->id);

        return back();
    }
}
