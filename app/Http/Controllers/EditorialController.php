<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Editorial;

class EditorialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $searchTerm = $request->search ?? null;

        $query = Editorial::query();

        if ($searchTerm) {
            $query->where('name', 'like', '%' . $searchTerm . '%');
        }

        $editorials = $query->get();

        $noResults = false;
        if ($searchTerm && $editorials->isEmpty()) {
            $noResults = true;
        }

        return view('trabajador.editorials.verEditorials', compact('editorials', 'searchTerm', 'noResults'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:editorials,name',
            'address' => 'required'
        ],
        [
            'name.unique' => 'El nombre de la editorial ya está en uso.'
        ]);

        Editorial::create($request->all());

        return redirect()->route('editorials.index')->with('success', 'Editorial creada.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $editorial = Editorial::findOrFail($id);
        return view('trabajador.editorials.editorialDetails', compact('editorial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $editorial = Editorial::findOrFail($id);

        $request->validate([
            'name' => 'required|unique:editorials,name,' . $editorial->id,
            'address' => 'required'
        ],
        [
            'name.unique' => 'El nombre de la editorial ya está en uso.'
        ]);

        $editorial->update($request->all());
        return redirect()->route('editorials.show', $editorial->id)->with('success', 'Editorial actualizada.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $editorial = Editorial::findOrFail($id);
        $editorial->delete();
        return redirect()->route('editorials.index')->with('success', 'Editorial eliminada.');
    }
}
