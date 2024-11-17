<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ $course->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="p-6 text-gray-900">
                    @if(session('success'))
                        <div class="mb-4 text-green-600 font-medium">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Botón para subir archivo -->
                    <div class="mb-6">
                        <a href="{{ route('courses.archives.create', $course->id) }}" 
                           class="px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md shadow hover:bg-blue-700">
                            Subir Archivo
                        </a>
                    </div>

                    <!-- Tabla de archivos -->
                    <h3 class="text-lg font-semibold mb-4">Archivos del curso</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full border-collapse border border-gray-200">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="py-3 px-4 text-left border border-gray-200">Nombre</th>
                                    <th class="py-3 px-4 text-left border border-gray-200">Subido por</th>
                                    <th class="py-3 px-4 text-left border border-gray-200">Fecha de Subida</th>
                                    <th class="py-3 px-4 text-center border border-gray-200">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($archives as $archive)
                                    <tr class="hover:bg-gray-50">
                                        <td class="py-3 px-4 border">{{ $archive->name }}</td>
                                        <td class="py-3 px-4 border">{{ $archive->mail }}</td>
                                        <td class="py-3 px-4 border">{{ \Carbon\Carbon::parse($archive->upload_date)->format('d-m-Y') }}</td>
                                        <td class="py-3 px-4 border text-center">
                                            <form action="{{ route('courses.archives.destroy', [$course->id, $archive->id]) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este archivo?');" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="text-red-600 hover:underline">
                                                    Eliminar
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Actividades -->
                    <h3 class="text-lg font-semibold mt-8 mb-4">Actividades del curso</h3>
                    <div class="mb-6">
                        <a href="{{ route('activities.create', $course->id) }}" 
                           class="px-4 py-2 bg-green-600 text-white text-sm font-medium rounded-md shadow hover:bg-green-700">
                            Crear Nueva Actividad
                        </a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full border-collapse border border-gray-200">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="py-3 px-4 text-left border border-gray-200">Actividad</th>
                                    <th class="py-3 px-4 text-center border border-gray-200">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($activities as $activity)
                                    <tr class="hover:bg-gray-50">
                                        <td class="py-3 px-4 border">
                                            <a href="{{ route('activities.grades.show', [$course->id, $activity->id]) }}" 
                                               class="text-blue-600 hover:underline">
                                                {{ $activity->name }}
                                            </a>
                                        </td>
                                        <td class="py-3 px-4 border text-center">
                                            <a href="{{ route('activities.edit', [$course->id, $activity->id]) }}" 
                                               class="text-yellow-600 hover:underline">
                                                Editar
                                            </a> |
                                            <form action="{{ route('activities.destroy', [$course->id, $activity->id]) }}" method="POST" style="display: inline;" onsubmit="return confirm('¿Estás seguro de eliminar esta actividad?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="text-red-600 hover:underline">
                                                    Eliminar
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
