<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="container">
                        <a href="{{ route('admin.dashboard') }}">Atras</a>
                        <h1>Lista de Cursos</h1>
                        <a href="{{ route('courses.create') }}" class="btn btn-primary mb-3">Crear Curso</a>
                    
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                    
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Nivel</th>
                                    <th>Profesor</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($courses as $course)
                                    <tr>
                                        <td><a href="{{ route('courses.show', $course->id) }}" class="text-blue-600 hover:underline">
                                            {{ $course->name }}
                                        </a></td>
                                        <td>{{ $course->level }}</td>
                                        <td>{{ $course->teacher->name ?? 'No asignado' }}</td>
                                        <td>
                                            <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                            <a href="{{ route('courses.assignStudents', $course->id) }}" class="btn btn-info btn-sm">Asignar Estudiantes</a>
                                            <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este curso?')">Eliminar</button>
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