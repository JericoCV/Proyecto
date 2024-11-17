<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __($course->name) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="p-6 text-gray-900">
                    <!-- Actividades del Curso -->
                    <h3 class="text-2xl font-bold mb-6">Actividades para {{ $course->name }}</h3>
                    
                    <table class="table-auto w-full bg-white border rounded-lg overflow-hidden">
                        <thead class="bg-blue-500 text-white">
                            <tr>
                                <th class="py-3 px-4 text-left">Actividad</th>
                                <th class="py-3 px-4 text-left">Nota</th>
                                <th class="py-3 px-4 text-left">Comentario</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($course->activities as $activity)
                                <tr class="border-b hover:bg-blue-50">
                                    <td class="py-2 px-4">{{ $activity->name }}</td>
                                    <td class="py-2 px-4">
                                        {{ $activity->grades[0]->grade ?? 'Sin nota' }}
                                    </td>
                                    <td class="py-2 px-4">
                                        {{ $activity->grades[0]->comment ?? 'Sin comentario' }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="py-4 px-6 text-center text-gray-500">No hay actividades registradas para este curso.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- Archivos del Curso -->
                    <h3 class="text-2xl font-bold mt-8 mb-6">Archivos del Curso</h3>

                    <table class="table-auto w-full bg-white border rounded-lg overflow-hidden">
                        <thead class="bg-green-500 text-white">
                            <tr>
                                <th class="py-3 px-4 text-left">Nombre</th>
                                <th class="py-3 px-4 text-left">Subido por</th>
                                <th class="py-3 px-4 text-left">Fecha de Subida</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($archives as $archive)
                                <tr class="border-b hover:bg-green-50">
                                    <td class="py-2 px-4">
                                        <a href="{{ asset('storage/' . $archive->path) }}" target="_blank" class="text-blue-600 hover:underline">
                                            {{ $archive->name }}
                                        </a>
                                    </td>
                                    <td class="py-2 px-4">{{ $archive->mail }}</td>
                                    <td class="py-2 px-4">{{ \Carbon\Carbon::parse($archive->upload_date)->format('d-m-Y') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="py-4 px-6 text-center text-gray-500">No hay archivos disponibles para este curso.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
