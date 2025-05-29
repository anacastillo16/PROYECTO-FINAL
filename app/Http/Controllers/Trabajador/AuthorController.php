<?php

namespace App\Http\Controllers\Trabajador;

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

        $searchTerm = $request->search ?? null;

        if ($searchTerm) {
            $query->where('name', 'like', '%' . $searchTerm . '%')
                  ->orWhere('lastname', 'like', '%' . $searchTerm . '%');
        }

        $books = $query->get();

        $noResults = false;
        if ($searchTerm && $books->isEmpty()) {
            $noResults = true;
        }

        $autors = $query->get();

        return view('trabajador.autors.verAutores', compact('autors', 'editoriales', 'noResults', 'searchTerm'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'dni' => 'required|unique:autors,dni',
            'name' => 'required',
            'lastname' => 'required',
            'phone' => 'required|unique:autors,phone',
            'email' => 'required|unique:autors,email',
            'editorial_id' => 'required'
        ],
[
            'dni.unique' => 'El DNI ya está en uso.',
            'phone.unique' => 'El teléfono ya está en uso.',
            'email.unique' => 'El correo electrónico ya está en uso.'
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
        $editoriales = Editorial::all();
        return view('trabajador.autors.autorDetails', compact('autor', 'editoriales'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $autor = Author::findOrFail($id);
        $request->validate([
            'dni' => 'required|unique:autors,dni,' . $autor->id,
            'name' => 'required',
            'lastname' => 'required',
            'phone' => 'required|unique:autors,phone,' . $autor->id,
            'email' => 'required|unique:autors,email,' . $autor->id,
            'editorial_id' => 'required'
        ],
[
            'dni.unique' => 'El DNI ya está en uso.',
            'phone.unique' => 'El teléfono ya está en uso.',
            'email.unique' => 'El correo electrónico ya está en uso.'
        ]);

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
