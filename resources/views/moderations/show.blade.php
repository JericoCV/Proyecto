<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Revisión del Archivo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold">
                        <a href="{{ asset('storage/' . $moderation->archive->path) }}" target="_blank" class="text-blue-600 hover:underline">
                            {{ $moderation->archive->name }}
                        </a>
                    </h3>
                    <p><strong>Subido por:</strong> {{ $moderation->archive->mail }}</p>
                    <p><strong>Fecha de subida:</strong> {{ $moderation->archive->upload_date }}</p>
                    <p>
                        <a href="{{ Storage::url($moderation->archive->path) }}" target="_blank" class="text-blue-500 hover:underline">Ver archivo</a>
                    </p>
    
                    <form action="{{ route('moderations.update', $moderation->id) }}" method="POST" class="mt-6">
                        @csrf
                        @method('PUT')
                        <label for="state" class="block font-medium text-sm text-gray-700 mb-2">Acción:</label>
                        <select name="state" id="state" class="form-select mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="approved">Aprobar</option>
                            <option value="denied">Denegar</option>
                        </select>
                        <button type="submit" class="mt-4 px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Actualizar</button>
                    </form>
    
                    <form action="{{ route('moderations.destroy', $moderation->id) }}" method="POST" class="mt-4">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="mt-4 px-6 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500">
                            Eliminar Archivo y Moderación
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
