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
        $editorials = Editorial::all();

        $query = Editorial::query();

        if ($request->has('search') && $request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
        $editorials = $query->get();
        
        return view('trabajador.editorials.verEditorials', compact('editorials'));
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
        return view('trabajador.editorials.editorialDetails', compact('editorial'));
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
