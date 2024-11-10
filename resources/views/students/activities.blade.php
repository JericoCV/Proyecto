<!-- resources/views/students/activities.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Actividades del Curso') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold mb-4">Actividades para {{ $course->name }}</h3>
                    <table class="min-w-full bg-white">
                        <thead>
                            <tr>
                                <th class="py-2">Actividad</th>
                                <th class="py-2">Nota</th>
                                <th class="py-2">Comentario</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($course->activities as $activity)
                                <tr>
                                    <td class="border px-4 py-2">{{ $activity->name }}</td>
                                    <td class="border px-4 py-2">
                                        {{ $activity->grades[0]->grade ? $activity->grades[0]->grade : 'Sin nota' }}
                                    </td>
                                    <td class="border px-4 py-2">
                                        {{ $activity->grades[0]->comment ? $activity->grades[0]->comment : 'Sin nota' }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
