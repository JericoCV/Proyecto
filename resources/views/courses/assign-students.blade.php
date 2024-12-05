<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ $course->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="container">
                        <h1 class="text-3xl font-bold mb-4">Asignar Estudiantes al Curso: {{ $course->name }}</h1>

                        @if (session('success'))
                        <div class="bg-green-100 text-green-800 border-l-4 border-green-500 p-4 mb-4">
                            {{ session('success') }}
                        </div>
                        @endif

                        <form action="{{ route('courses.storeAssignedStudents', $course->id) }}" method="POST"
                            class="space-y-6">
                            @csrf

                            @if($studentsNotAssigned->isEmpty())
                            <!-- Verificamos si la variable está vacía -->
                            <div class="text-center py-4">
                                <p class="text-lg font-medium text-gray-700">
                                    Todos los estudiantes están asignados a este curso.
                                </p>
                            </div>
                            @else
                            <div>
                                <label class="block text-lg font-medium text-gray-700">Estudiantes no asignados a este
                                    curso:</label>
                                <div class="mt-4">
                                    @foreach($studentsNotAssigned as $student)
                                    <div class="flex items-center mb-4">
                                        <input type="checkbox"
                                            class="form-checkbox h-5 w-5 text-blue-600 border-gray-300 rounded-md focus:ring-blue-500 focus:ring-2 transition duration-150 ease-in-out"
                                            name="students[]" value="{{ $student->id }}"
                                            id="student-{{ $student->id }}">
                                        <label class="ml-2 text-gray-700" for="student-{{ $student->id }}">
                                            {{ $student->name }}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="flex items-center justify-end space-x-4">
                                <button type="submit"
                                    class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-md shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    Asignar Estudiantes
                                </button>
                                <a href="{{ route('courses.index') }}"
                                    class="px-6 py-2 bg-gray-400 text-white font-semibold rounded-md shadow-md hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-500">
                                    Cancelar
                                </a>
                            </div>
                            @endif
                        </form>

                        <p class="block text-lg font-medium text-gray-700 mb-2">Estudiantes asignados a este curso:</p>
                        <div class="border-solid border rounded border-blue-700 p-4">
                            <!-- Se añadió padding al contenedor -->
                            @foreach($studentsAssigned as $student)
                            <div class="flex justify-between items-center mb-2">
                                <!-- Espaciado entre elementos -->
                                <p class="text-left">{{ $student->name }}</p>
                                <form action="{{ route('courses.removeAssignedStudent', [$course->id, $student->id]) }}"
                                    method="POST" class="space-y-2">
                                    @csrf
                                    <button type="submit"
                                        class="px-6 py-1 bg-red-600 text-white font-semibold rounded-md shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        onclick="return confirm('¿Estás seguro de quitar este estudiante?')">
                                        Quitar estudiante
                                    </button>
                                </form>
                            </div>
                            @endforeach
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>