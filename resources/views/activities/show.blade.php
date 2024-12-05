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
                    <h3 class="text-lg font-bold mb-6">Registro de Notas - {{ $course->name }} - {{ $month }}</h3>

                    <!-- Formulario de Calificaciones -->
                    <form action="{{ route('grades.update', [$course->id, $month]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="py-3 px-4 text-left text-sm font-medium text-gray-700">Estudiante</th>
                                    @foreach ($course->activities as $activity)
                                    <th class="py-3 px-4 text-left text-sm font-medium text-gray-700">{{ $activity->name
                                        }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                <tr class="border-t border-gray-200">
                                    <td class="px-4 py-3 text-sm text-gray-700">{{ $student->fullname }}</td>
                                    @foreach ($course->activities as $activity)
                                    @php
                                    $grade = $grades[$student->id][$activity->id] ?? null;
                                    @endphp
                                    <td>
                                        <input type="hidden"
                                            name="grades[{{ $student->id }}][{{ $activity->id }}][activity_id]"
                                            value="{{ $activity->id }}">
                                        <input type="hidden"
                                            name="grades[{{ $student->id }}][{{ $activity->id }}][student_id]"
                                            value="{{ $student->id }}">
                                        <label for="grades[{{ $student->id }}][{{ $activity->id }}][grade]">Nota</label>
                                        <input class="border-solid border rounded" type="number"
                                            name="grades[{{ $student->id }}][{{ $activity->id }}][grade]"
                                            value="{{ $grade->grade ?? '' }}" min="0" max="100">
                                        <textarea name="grades[{{ $student->id }}][{{ $activity->id }}][comment]"
                                            class="form-control mt-2"
                                            placeholder="Comentario">{{ $grade->comment ?? '' }}</textarea>
                                    </td>
                                    @endforeach
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