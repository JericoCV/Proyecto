<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Calificaciones de la Actividad') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold mb-6">Calificaciones para "{{ $activity->name }}"</h3>

                    <!-- Formulario de Calificaciones -->
                    <form action="{{ route('grades.update', [$course->id, $activity->id]) }}" method="POST">
                        @csrf

                        <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="py-3 px-4 text-left text-sm font-medium text-gray-700">Estudiante</th>
                                    <th class="py-3 px-4 text-left text-sm font-medium text-gray-700">Nota</th>
                                    <th class="py-3 px-4 text-left text-sm font-medium text-gray-700">Comentario</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                    <tr class="border-t border-gray-200">
                                        <td class="px-4 py-3 text-sm text-gray-700">{{ $student->fullname }}</td>
                                        <td class="px-4 py-3">
                                            <input 
                                                type="number" 
                                                name="grades[{{ $student->id }}][grade]" 
                                                value="{{ $student->grades[0]->grade ?? '' }}" 
                                                min="0" 
                                                max="100" 
                                                class="w-20 text-center border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                        </td>
                                        <td class="px-4 py-3">
                                            <input 
                                                type="text" 
                                                name="grades[{{ $student->id }}][comment]" 
                                                value="{{ $student->grades[0]->comment ?? '' }}" 
                                                class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                        </td>
                                        <td class="hidden">
                                            @if($student->grade)
                                                <input 
                                                    type="hidden" 
                                                    name="grades[{{ $student->id }}][grade_id]" 
                                                    value="{{ $student->grade->id }}">
                                            @endif
                                            <input type="hidden" name="teacher_id" value="{{ Auth::user()->id }}">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="flex items-center justify-between mt-6">
                            <a href="{{ route('courses.myCourse', $course->id) }}" 
                               class="text-gray-600 hover:text-gray-800 font-medium">
                                Volver a {{ $course->name }}
                            </a>
                            <button type="submit" 
                                    class="px-4 py-2 bg-blue-600 text-white font-semibold text-sm rounded-md shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Guardar Calificaciones
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
