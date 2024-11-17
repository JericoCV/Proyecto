<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Archivos de '.$course->name) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(session('success'))
                        <div class="mb-4 p-4 bg-green-100 text-green-800 border border-green-300 rounded-lg">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Botón para subir archivo -->
                    <a href="{{ route('courses.archives.create', $course->id) }}" class="mb-4 inline-block bg-blue-500 text-white hover:bg-blue-700 px-4 py-2 rounded-lg shadow-md">
                        Subir Archivo
                    </a>

                    <!-- Tabla de archivos -->
                    <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="py-3 px-4 text-left text-sm font-semibold text-gray-600">Nombre</th>
                                <th class="py-3 px-4 text-left text-sm font-semibold text-gray-600">Subido por</th>
                                <th class="py-3 px-4 text-left text-sm font-semibold text-gray-600">Fecha de Subida</th>
                                <th class="py-3 px-4 text-left text-sm font-semibold text-gray-600">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($archives as $archive)
                                <tr class="hover:bg-gray-50">
                                    <td class="py-2 px-4 text-sm">
                                        <a href="{{ asset('storage/' . $archive->path) }}" target="_blank" class="text-blue-600 hover:underline">
                                            {{ $archive->name }}
                                        </a>
                                    </td>
                                    <td class="py-2 px-4 text-sm">{{ $archive->mail }}</td>
                                    <td class="py-2 px-4 text-sm">{{ \Carbon\Carbon::parse($archive->upload_date)->format('d-m-Y') }}</td>
                                    <td class="py-2 px-4 text-sm">
                                        @if(Auth::user()->role_id === 1)
                                            <form action="{{ route('courses.archives.destroy', [$course->id, $archive->id]) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este archivo?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-600 text-white hover:bg-red-700 px-3 py-1 text-sm rounded-lg shadow-md">
                                                    Eliminar
                                                </button>
                                            </form>
                                        @endif
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
