<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        // Mostrar todos los usuarios
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function show($id)
    {
        // Mostrar un usuario específico
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        // Crear un nuevo usuario
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::create($validatedData);
        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // Actualizar un usuario
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        User::whereId($id)->update($validatedData);
        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        // Eliminar un usuario
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index');
    }
}

