<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Editar Página') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-semibold text-blue-700 mb-6">Editar Página: {{ $page->title }}</h1>
    
                    <form action="{{ route('pages.update', $page->id) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')
    
                        <!-- Title Input -->
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Título:</label>
                            <input type="text" name="title" id="title" value="{{ old('title', $page->title) }}" required
                                class="block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            @error('title')
                            <small class="text-red-500">{{ $message }}</small>
                            @enderror
                        </div>
    
                        <!-- Content Textarea -->
                        <div>
                            <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Contenido:</label>
                            <textarea name="content" id="content" required rows="5"
                                class="block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">{{ old('content', $page->content) }}</textarea>
                            @error('content')
                            <small class="text-red-500">{{ $message }}</small>
                            @enderror
                        </div>
    
                        <!-- Creation Date Input -->
                        <div>
                            <label for="creation_date" class="block text-sm font-medium text-gray-700 mb-2">Fecha de Creación:</label>
                            <input type="date" name="creation_date" id="creation_date"
                                value="{{ old('creation_date', $page->creation_date ? \Carbon\Carbon::parse($page->creation_date)->format('Y-m-d') : '') }}"
                                class="block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            @error('creation_date')
                            <small class="text-red-500">{{ $message }}</small>
                            @enderror
                        </div>
    
                        <!-- Hidden Input -->
                        <input type="hidden" name="Administrator_id" value="{{ old('Administrator_id', $page->Administrator_id) }}">
    
                        <!-- Buttons -->
                        <div class="flex items-center space-x-4">
                            <button type="submit"
                                class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-200">
                                Actualizar Página
                            </button>
                            <a href="{{ route('pages.index') }}"
                                class="px-6 py-2 bg-gray-300 text-gray-800 font-semibold rounded-lg shadow-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-opacity-50 transition duration-200">
                                Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>