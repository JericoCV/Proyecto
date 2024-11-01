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
        $user = User::findOrfail($id);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('users.index');
    }

    public function destroy($id){
        $user = User::findOrfail($id);
        $user->delete();
        return redirect()->route('users.index');
    }

    public static function getUserRole($userId){
        $roleName = User::getUserRole($userId);
        return $roleName;
    }
}
