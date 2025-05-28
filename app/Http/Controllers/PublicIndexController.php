<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;

class PublicIndexController extends Controller
{
    public function index(Request $request)
    {
        $autores = Author::all();
        $query = Book::with('autor');

        $searchTerm = $request->search ?? null;

        if ($searchTerm) {
            $query->where('title', 'like', '%' . $searchTerm . '%');
        }

        $books = $query->paginate(10)->withQueryString();

        $noResults = $searchTerm && $books->isEmpty();

        return view('index', compact('books', 'autores', 'noResults', 'searchTerm'));
    }
}
