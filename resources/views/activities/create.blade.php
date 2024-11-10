<!-- resources/views/teachers/activities/create.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Nueva Actividad') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold mb-4">Nueva Actividad para el Curso</h3>

                    <form action="{{ route('activities.store', $course->id) }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="name" class="block text-gray-700">Nombre de la Actividad:</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full border rounded px-3 py-2" required>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-gray-500 font-bold py-2 px-4 rounded">
                                Crear Actividad
                            </button>
                            <a href="{{ route('courses.myCourse', $course->id) }}" class="ml-4 text-gray-500 hover:text-gray-700">
                                Cancelar
                            </a>
                            <input type="hidden" name="teacher_id" value="{{Auth::user()->id}}">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
