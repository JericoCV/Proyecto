<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Detalles de Sección 
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-2xl font-semibold mb-4">Edit Section</h3>
    
                    <form action="{{ route('pages.sections.update', [$page_id, $section->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
    
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700">Section Title:</label>
                            <input type="text" name="title" id="title" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $section->title }}" required>
                        </div>
    
                        <div class="mb-4">
                            <label for="order" class="block text-sm font-medium text-gray-700">Order:</label>
                            <input type="number" name="order" id="order" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $section->order }}" required>
                        </div>
    
                        <button type="submit" class="w-full py-2 px-4 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
                            Update Section
                        </button>
                    </form>
    
                    <a href="{{ route('pages.sections.index', [$page_id, $section->id]) }}" class="mt-4 inline-block text-center w-full py-2 px-4 bg-gray-300 text-gray-700 font-semibold rounded-lg shadow-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-opacity-75">
                        Back to Sections
                    </a>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
