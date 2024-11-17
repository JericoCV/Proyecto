<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Lista de Usuarios
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container">
                        <!-- Back Link -->
                        <a href="{{ route('admin.dashboard') }}" class="text-blue-500 hover:text-blue-700"><h1 class="my-4">Atras</h1></a>
    
                        <!-- New User Button -->
                        <form action="{{ route('users.create') }}" method="GET">
                            <button type="submit" class="my-4 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                                Nuevo Usuario
                            </button>
                        </form>
    
                        <!-- List of Users -->
                        <h1 class="my-4 text-xl font-semibold">Lista de Usuarios</h1>
    
                        <!-- User Table -->
                        <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
                            <table class="min-w-full table-auto border-collapse">
                                <thead class="bg-gray-200">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase">Nombre</th>
                                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase">Email</th>
                                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase">Rol</th>
                                        <th class="px-6 py-3 text-center text-sm font-medium text-gray-700 uppercase">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody class="text-sm text-gray-700">
                                    @foreach($users as $usuario)
                                    <tr class="hover:bg-gray-100">
                                        <td class="px-6 py-4">{{ $usuario->name }}</td>
                                        <td class="px-6 py-4">{{ $usuario->email }}</td>
                                        <td class="px-6 py-4">{{ $usuario->role->role_name ?? 'Sin rol asignado' }}</td>
                                        <td class="px-6 py-4 text-center">
                                            <a href="{{ route('users.edit', $usuario->id) }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Editar</a>
                                            <form action="{{ route('users.destroy', $usuario->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="inline-block bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-500"
                                                    onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?')">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
</x-app-layout>