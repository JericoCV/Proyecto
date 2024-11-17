<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-light-800 leading-tight">
            {{ __('Nueva Página') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-semibold text-blue-700 mb-6">Crear Nueva Página</h1>
                    <form action="{{ route('pages.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <!-- Title Input -->
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Título:</label>
                            <input type="text" name="title" id="title" required
                                class="block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        </div>
    
                        <!-- Content Textarea -->
                        <div>
                            <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Descripción de la página:</label>
                            <textarea name="content" id="content" required rows="4"
                                class="block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"></textarea>
                        </div>
    
                        <!-- Hidden inputs -->
                        <input type="hidden" name="creation_date" value="{{ now()->format('Y-m-d H:i:s') }}">
                        <input type="hidden" name="Administrator_id" value="{{ auth()->user()->id }}">
    
                        <!-- Buttons -->
                        <div class="flex items-center space-x-4">
                            <button type="submit"
                                class="px-6 py-2 bg-blue-600 text-gray-800 font-semibold rounded-lg shadow-md hover:bg-blue-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-200">
                                Crear Página
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