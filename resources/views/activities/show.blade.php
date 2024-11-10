<!-- resources/views/teachers/activities/show.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Calificaciones de la Actividad') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold mb-4">Calificaciones para {{ $activity->name }}</h3>

                    <form action="{{ route('grades.update', [$course->id, $activity->id]) }}" method="POST">
                        @csrf
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr>
                                    <th class="py-2">Estudiante</th>
                                    <th class="py-2">Nota</th>
                                    <th class="py-2">Comentario</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                
                                    <tr>
                                        <td class="border px-4 py-2">{{ $student->fullname }}</td>
                                        <td class="border px-4 py-2">
                                            <input type="number" name="grades[{{ $student->id }}][grade]" value="{{ $student->grades[0]->grade ? $student->grades[0]->grade : '' }}" class="w-20 text-center border rounded">
                                        </td>
                                        <td class="border px-4 py-2">
                                            <input type="text" name="grades[{{ $student->id }}][comment]" value="{{ $student->grades[0]->comment ? $student->grades[0]->comment : '' }}" class="w-full border rounded">
                                        </td>
                                        <td>
                                            <!-- Si la calificación existe, enviar el ID para la actualización -->
                                            @if($student->grade)
                                                <input type="hidden" name="grades[{{ $student->id }}][grade_id]" value="{{ $student->grade->id }}">
                                            @endif
                                            <input type="hidden" name="teacher_id" value="{{Auth::user()->id}}">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <button type="submit" class="mt-4 bg-blue-500 text-dark px-4 py-2 rounded">Guardar Calificaciones</button>
                        <a href="{{ route('courses.myCourse', $course->id) }}" class="text-blue-600 hover:underline">
                            Volver a {{ $course->name }}
                        </a>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
