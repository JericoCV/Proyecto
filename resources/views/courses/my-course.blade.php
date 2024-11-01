<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Archivos del Curso') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <!-- Botón para subir archivo -->
                        <a href="{{ route('courses.archives.create', $course->id) }}" class="btn btn-primary mb-3">Subir Archivo</a>

                    <!-- Tabla de archivos -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Subido por</th>
                                <th>Fecha de Subida</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($archives as $archive)
                                <tr>
                                    <td><a href="{{ asset('storage/' . $archive->path) }}" target="_blank">{{ $archive->name }}</a></td>
                                    <td>{{ $archive->mail }}</td>
                                    <td>{{ \Carbon\Carbon::parse($archive->upload_date)->format('d-m-Y') }}</td>
                                    <td>
                                            <form action="{{ route('courses.archives.destroy', [$course->id, $archive->id]) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este archivo?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
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
</x-app-layout>
