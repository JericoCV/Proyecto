<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RolController extends Controller
{
    /**
     * Muestra una lista de los roles.
     */
    public function index()
    {
        // Obtener todos los roles
        $roles = Role::all();
        return view('roles.index', compact('roles')); // Supone que existe una vista para listar roles
    }

    /**
     * Muestra el formulario para crear un nuevo rol.
     */
    public function create()
    {
        return view('roles.create');  // Supone que existe una vista para crear roles
    }

    /**
     * Almacena un nuevo rol en la base de datos.
     */
    public function store(Request $request)
    {
        // Validar los datos
        $request->validate([
            'role_name' => 'required|string|max:255|unique:role',
        ]);

        // Crear el nuevo rol
        Role::create([
            'role_name' => $request->NombreRol,
        ]);

        return redirect()->route('roles.index')->with('success', 'Rol creado exitosamente');
    }

    /**
     * Muestra el formulario para editar un rol existente.
     */
    public function edit(Role $role)
    {
        return view('roles.edit', compact('role'));  // Supone que existe una vista para editar roles
    }

    /**
     * Actualiza un rol en la base de datos.
     */
    public function update(Request $request, Role $role)
    {
        // Validar los datos
        $request->validate([
            'rol_name' => 'required|string|max:255|unique:role,role_name,' . $role->id,
        ]);

        // Actualizar el rol
        $role->update([
            'role_name' => $request->rol_name,
        ]);

        return redirect()->route('roles.index')->with('success', 'Rol actualizado exitosamente');
    }

    /**
     * Elimina un rol de la base de datos.
     */
    public function destroy(Role $role)
    {
        // Eliminar el rol
        $role->delete();

        return redirect()->route('roles.index')->with('success', 'Rol eliminado exitosamente');
    }
}
