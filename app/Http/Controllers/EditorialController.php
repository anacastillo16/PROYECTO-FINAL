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
    public function index()
    {
        $editorials = Editorial::all();
        return view('editorials.verEditorials', compact('editorials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('editorials.crearEditorial');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required'
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
        return view('editorials.editorialDetails', compact('editorial'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $editorial = Editorial::findOrFail($id);
        return view('editorials.editarEditorial', compact('editorial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $editorial = Editorial::findOrFail($id);
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
