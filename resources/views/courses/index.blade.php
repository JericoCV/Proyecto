<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Cursos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
    
                    <div class="container">
                        <a href="{{ route('admin.dashboard') }}" class="text-blue-500 hover:text-blue-700 font-semibold mb-3 inline-block">Atrás</a>
                        <h1 class="text-3xl font-bold mb-4">Lista de Cursos</h1>
                        <a href="{{ route('courses.create') }}" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 mb-4 inline-block">Crear Curso</a>
                    
                        @if (session('success'))
                            <div class="bg-green-100 text-green-800 border-l-4 border-green-500 p-4 mb-4">
                                {{ session('success') }}
                            </div>
                        @endif
                    
                        <table class="min-w-full table-auto bg-white border-separate border border-gray-200 rounded-lg shadow-md">
                            <thead class="bg-blue-600 text-white">
                                <tr>
                                    <th class="py-3 px-6 text-left">Nombre</th>
                                    <th class="py-3 px-6 text-left">Nivel</th>
                                    <th class="py-3 px-6 text-left">Profesor</th>
                                    <th class="py-3 px-6 text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($courses as $course)
                                    <tr class="border-b hover:bg-gray-100">
                                        <td class="py-3 px-6">
                                            <a href="{{ route('courses.show', $course->id) }}" class="text-blue-600 hover:underline">{{ $course->name }}</a>
                                        </td>
                                        <td class="py-3 px-6">{{ $course->level }}</td>
                                        <td class="py-3 px-6">{{ $course->teacher->name ?? 'No asignado' }}</td>
                                        <td class="py-3 px-6 text-center">
                                            <a href="{{ route('courses.edit', $course->id) }}" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-yellow-600 focus:outline-none">Editar</a>
                                            <a href="{{ route('courses.assignStudents', $course->id) }}" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none">Asignar Estudiantes</a>
                                            <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display:inline;" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-500 focus:outline-none" onclick="return confirm('¿Estás seguro de eliminar este curso?')">Eliminar</button>
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
    
</x-app-layout>