<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Revisión del Archivo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3><a href="{{ asset('storage/' . $moderation->archive->path) }}" target="_blank">{{ $moderation->archive->name }}</a></td></h3>
                    <p><strong>Subido por:</strong> {{ $moderation->archive->mail }}</p>
                    <p><strong>Fecha de subida:</strong> {{ $moderation->archive->upload_date }}</p>
                    <p><a href="{{ Storage::url($moderation->archive->path) }}" target="_blank" class="text-blue-500">Ver archivo</a></p>
                    
                    <form action="{{ route('moderations.update', $moderation->id) }}" method="POST" class="mt-4">
                        @csrf
                        @method('PUT')
                        <label for="state" class="block font-medium text-sm text-gray-700">Acción:</label>
                        <select name="state" id="state" class="form-select mt-1 block w-full">
                            <option value="approved">Aprobar</option>
                            <option value="denied">Denegar</option>
                        </select>
                        <button type="submit" class="btn btn-primary mt-4">Actualizar</button>
                    </form>
                    
                    <form action="{{ route('moderations.destroy', $moderation->id) }}" method="POST" class="mt-4">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar Archivo y Moderación</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
