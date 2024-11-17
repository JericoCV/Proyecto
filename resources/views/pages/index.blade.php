<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Ver Paginas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-semibold text-blue-700 mb-6">Páginas</h1>

                    <!-- Create Page Button -->
                    <a href="{{ route('pages.create') }}" class="inline-block bg-blue-800 text-white px-6 py-2 rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-200 mb-4">
                        Crear Página
                    </a>

                    <!-- Pages Table -->
                    <table class="min-w-full table-auto bg-white border border-gray-200 shadow-sm rounded-lg">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 border-b">ID</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 border-b">Título</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 border-b">Fecha de Creación</th>
                                <th class="px-4 py-2 text-left text-sm font-medium text-gray-700 border-b">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pages as $page)
                            <tr class="hover:bg-gray-50 transition duration-200">
                                <td class="px-4 py-2 text-sm text-gray-700 border-b">{{ $page->id }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700 border-b">{{ $page->title }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700 border-b">{{ $page->creation_date ? \Carbon\Carbon::parse($page->creation_date)->format('Y-m-d') : 'N/A' }}</td>
                                <td class="px-4 py-2 text-sm text-gray-700 border-b">
                                    <a href="{{ route('pages.edit', $page->id) }}"
                                        class="inline-block bg-green-500 text-white px-4 py-2 rounded-lg shadow-sm hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-opacity-50 transition duration-200 mr-2">
                                        Editar
                                    </a>
                                    <a href="{{ route('pages.show', $page->id) }}"
                                        class="inline-block bg-blue-500 text-white px-4 py-2 rounded-lg shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50 transition duration-200 mr-2">
                                        Administrar
                                    </a>
                                    <form action="{{ route('pages.destroy', $page->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-block bg-red-600 text-white px-4 py-2 rounded-lg shadow-sm hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-50 transition duration-200"
                                            onclick="return confirm('Are you sure you want to delete this page?');">
                                            Borrar
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
</x-app-layout>
