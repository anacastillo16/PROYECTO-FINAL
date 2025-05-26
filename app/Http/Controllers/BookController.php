<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $books = Book::all();
        $user = auth()->user();
        $autores = Author::all();

        $query = Book::with('autor');

        if ($request->has('search') && $request->search) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $books = $query->get();

        return view('index.indexTRABAJADOR', compact('books', 'user', 'autores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $autores = Author::all();
        return view('books.crearLibro', compact('autores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'isbn' => 'required',
            'title' => 'required',
            'autor_id' => 'required',
            'image' => 'required',
            'description' => 'required'
        ]);

        Book::create($request->all());

        return redirect()->route('index.trabajador')->with('success', 'Libro creado.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::findOrFail($id);
        $autores = Author::all();
        return view('books.booksDetails', compact('book', 'autores'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::findOrFail($id);
        $autores = Author::all();
        return view('books.editarLibro', compact('book', 'autores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $book = Book::findOrFail($id);
        $book->update($request->all());
        return redirect()->route('books.show', $book->id)->with('success', 'Libro actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect()->route('index.trabajador')->with('success', 'Libro eliminado.');
    }
}
