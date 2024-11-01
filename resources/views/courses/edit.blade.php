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
                        <h1>Editar Curso</h1>
                    
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    
                        <form action="{{ route('courses.update', $course->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Nombre del curso</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $course->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="level">Nivel</label>
                                <select name="level" id="level"class="form-control" required>
                                    <option value="basico" {{ $course->level == 'basico' ? 'selected' : '' }}>Basic</option>
                                    <option value="intermedio" {{ $course->level == 'intermedio' ? 'selected' : '' }}>Intermediate</option>
                                    <option value="avanzado" {{ $course->level == 'avanzado' ? 'selected' : '' }}>Advanced</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="teacher_id">Profesor</label>
                                <select name="teacher_id" id="teacher_id" class="form-control">
                                    @foreach($teachers as $teacher)
                                        <option value="{{ $teacher->id }}" {{ $teacher->id == $course->teacher_id ? 'selected' : '' }}>
                                            {{ $teacher->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                            <a href="{{ route('courses.index') }}" class="btn btn-secondary">Cancelar</a>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>