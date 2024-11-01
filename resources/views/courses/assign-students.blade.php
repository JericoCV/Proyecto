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
                        <h1>Asignar Estudiantes al Curso: {{ $course->name }}</h1>
                    
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                    
                        <form action="{{ route('courses.storeAssignedStudents', $course->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Estudiantes:</label>
                                @foreach($students as $student)
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="students[]" value="{{ $student->id }}"
                                               id="student-{{ $student->id }}">
                                        <label class="form-check-label" for="student-{{ $student->id }}">
                                            {{ $student->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <button type="submit" class="btn btn-primary">Asignar Estudiantes</button>
                            <a href="{{ route('courses.index') }}" class="btn btn-secondary">Cancelar</a>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>