<?php


namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        // Si necesitas pasar datos a la vista, puedes definirlos aquí
        $viewData = [
            'title' => 'Home - BikeTrek',
            'subtitle' => 'Welcome to BikeTrek',
            // Otros datos que quieras pasar a la vista
        ];

        return view('home.index', $viewData);
    }
}
