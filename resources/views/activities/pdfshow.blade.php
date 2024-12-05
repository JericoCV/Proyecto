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
                    <h3 class="text-lg font-bold mb-6">Calificaciones - {{ $course->name }} - {{ $month }}</h3>

                    <!-- Tabla de Visualización de Calificaciones -->
                    <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="py-3 px-4 text-left text-sm font-medium text-gray-700">Estudiante</th>
                                @foreach ($course->activities as $activity)
                                <th class="py-3 px-4 text-left text-sm font-medium text-gray-700">{{ $activity->name }}</th>
                                @endforeach
                                <th class="py-3 px-4 text-left text-sm font-medium text-gray-700">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                            <tr class="border-t border-gray-200">
                                <!-- Nombre del Estudiante -->
                                <td class="px-4 py-3 text-sm text-gray-700">{{ $student->fullname }}</td>

                                <!-- Notas y Comentarios -->
                                @foreach ($course->activities as $activity)
                                @php
                                $grade = $grades[$student->id][$activity->id] ?? null;
                                @endphp
                                <td class="px-4 py-3 text-sm text-gray-700">
                                    <div><strong>Nota:</strong> {{ $grade->grade ?? 'N/A' }}</div>
                                    <div><strong>Comentario:</strong> {{ $grade->comment ?? 'Sin comentario' }}</div>
                                </td>
                                @endforeach

                                <!-- Botón para Generar PDF -->
                                <td class="px-4 py-3 text-sm text-gray-700">
                                    <form action="{{ route('grades.generatePdfForStudent', [$course->id, $student->id]) }}" method="POST" target="_blank">
                                        @csrf
                                        <!-- Pasar las notas del estudiante al servidor -->
                                        @foreach ($course->activities as $activity)
                                        @php
                                        $grade = $grades[$student->id][$activity->id] ?? null;
                                        @endphp
                                        <input type="hidden" name="grades[{{ $activity->id }}][grade]" value="{{ $grade->grade ?? '' }}">
                                        <input type="hidden" name="grades[{{ $activity->id }}][comment]" value="{{ $grade->comment ?? '' }}">
                                        @endforeach
                                        <button type="submit"
                                            class="px-4 py-2 bg-blue-600 text-white font-semibold text-sm rounded-md shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                            Generar PDF
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Enlace para Volver -->
                    <div class="mt-6">
                        <a href="{{ route('courses.myCourse', $course->id) }}" class="text-gray-600 hover:text-gray-800 font-medium">
                            Volver a {{ $course->name }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
