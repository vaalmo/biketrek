<?php


namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $viewData = [
            'title' => 'Home - BikeTrek',
            'subtitle' => 'Welcome to BikeTrek',
        ];

        return view('home.index', $viewData);
    }
    public function admin(): View
    {
        $viewData = [
            'title' => 'Admin - BikeTrek',
            'subtitle' => 'Welcome to DashBoard',
        ];

        return view('home.admin', $viewData);
    }
}
