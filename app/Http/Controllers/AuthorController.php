<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Editorial;
use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $autors = Author::all();
        $editoriales = Editorial::all();

        $query = Author::with('editorial');

        if ($request->has('search') && $request->search) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('lastname', 'like', '%' . $request->search . '%');
        }
        
        $autors = $query->get();

        return view('autors.verAutores', compact('autors', 'editoriales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $editoriales = Editorial::all();
        return view('autors.crearAutor', compact('editoriales'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'dni' => 'required',
            'name' => 'required',
            'lastname' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'editorial_id' => 'required'
        ]);

        Author::create($request->all());

        return redirect()->route('autors.index')->with('success', 'Autor creado.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $autor = Author::findOrFail($id);
        return view('autors.autorDetails', compact('autor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $autor = Author::findOrFail($id);
        $editoriales = Editorial::all();
        return view('autors.editarAutor', compact('autor', 'editoriales'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $autor = Author::findOrFail($id);
        $autor->update($request->all());
        return redirect()->route('autors.show', $autor->id)->with('success', 'Autor actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $autor = Author::findOrFail($id);
        $autor->delete();
        return redirect()->route('autors.index')->with('success', 'Autor eliminado.');
    }
}
