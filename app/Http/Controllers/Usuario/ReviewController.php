<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    // Guardar nueva reseña
    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'string',
        ]);

        // Crear la reseña
        Review::create([
            'user_id' => Auth::id(),
            'book_id' => $request->book_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->back()->with('success', 'Reseña publicada correctamente.');
    }

    // Actualizar reseña 
    public function update(Request $request, Review $review)
    {
        // Solo el autor de la reseña puede modificarla
        if ($review->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para editar esta reseña.');
        }

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        $review->update([
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->back()->with('success', 'Reseña actualizada correctamente.');
    }


    // Borrar reseña
    public function destroy(Review $review)
    {
        // Solo puede borrar su propia reseña (o admin si tienes)
        if ($review->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para eliminar esta reseña.');
        }

        $review->delete();

        return redirect()->back()->with('success', 'Reseña eliminada correctamente.');
    }
}
