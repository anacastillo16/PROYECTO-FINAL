<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Book::with(['autor.editorial']);

        if ($search) {
            $query->where('title', 'LIKE', '%' . $search . '%')
                ->orWhereHas('autor', function ($q) use ($search) {
                    $q->where('name', 'LIKE', '%' . $search . '%')
                        ->orWhere('lastname', 'LIKE', '%' . $search . '%')
                        ->orWhereRaw("CONCAT(name, ' ', lastname) LIKE ?", ["%$search%"]);
                })
                ->orWhereHas('autor.editorial', function ($q2) use ($search) {
                    $q2->where('name', 'LIKE', '%' . $search . '%');
                });
        }

        $books = $query->paginate(8)->withQueryString();

        $noResults = $books->isEmpty() && $search;

        return view('usuario.indexUSUARIO', compact('books', 'noResults'));
    }

    /**
     * Show the details of a specific book.
     */
    public function showBook($id){
        $book = Book::with(['autor.editorial'])->findOrFail($id);
        return view('usuario.books.booksDetails', compact('book'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
