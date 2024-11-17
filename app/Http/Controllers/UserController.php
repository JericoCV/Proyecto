<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function index()
    {
        $users = User::whereHas('role', function ($query) {
            $query->whereIn('role_name', ['Docente', 'Estudiante']);
        })->get();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        User::create($request->all());
        return redirect()->route('users.index');
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit')->with(compact('user'));
    }

    public function update(Request $request, $id)
    {
        // Buscar el usuario por ID
        $user = User::findOrFail($id);

        // Validación de los campos
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            // Validación para la contraseña solo si está presente
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
        ]);

        // Actualizar los datos del usuario
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            // Si se proporciona una nueva contraseña, actualizarla
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        // Redirigir a la lista de usuarios con un mensaje de éxito
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }


    public function destroy($id)
    {
        $user = User::findOrfail($id);
        $user->delete();
        return redirect()->route('users.index');
    }

    public static function getUserRole($userId)
    {
        $roleName = User::getUserRole($userId);
        return $roleName;
    }

    public static function getUserNameById($id)
    {
        $user = User::findOrFail($id);
        return $user;
    }
}
