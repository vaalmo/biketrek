<?php
 
namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
 
class ReviewController extends Controller
{
    public function create(): View
    {
        return view('review.create');
        
    }

    public function save(Request $request): View{
        Review::create($request->only(['comment', 'raiting']));
        return view('review.save');
    }

    

    

    
    public function index(): View
    {
        $viewData = [];
        $viewData['reviews']  = Review::all();
        return view('review.index') -> with('viewData', $viewData);
    }

    // Mostrar una sola reseña por su ID
    public function show($id): View
    {
        // Buscar la reseña por su ID
        $review = Review::findOrFail($id);

        // Pasar la reseña a la vista
        return view('review.show') -> with('review', $review);
    }

    // Eliminar una reseña por su ID
    public function delete($id): RedirectResponse
    {
        // Buscar la reseña por su ID
        $review = Review::findOrFail($id);

        // Eliminar la reseña
        $review->delete();

        // Redirigir a la lista de reseñas con un mensaje de éxito
        // No es necesario crear una ruta para este, ya que redirecciona a review.index
        return redirect()->route('review.index')->with('status', 'Reseña eliminada correctamente.');
    }
}

    
    
