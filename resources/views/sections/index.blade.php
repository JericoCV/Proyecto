<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
           Secciones de Página
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
    
                    @if($sections->isEmpty())
                        <p class="text-lg text-gray-500">No sections found for this page.</p>
                    @else
                        <table class="table-auto w-full border-collapse">
                            <thead>
                                <tr class="bg-gray-100 text-left">
                                    <th class="px-4 py-2 border-b">Título de Sección</th>
                                    <th class="px-4 py-2 border-b">Órden</th>
                                    <th class="px-4 py-2 border-b">Texto</th>
                                    <th class="px-4 py-2 border-b">Imagenes</th>
                                    <th class="px-4 py-2 border-b">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sections as $section)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-2 border-b">{{ $section->title }}</td>
                                        <td class="px-4 py-2 border-b">{{ $section->order }}</td>
                                        <td class="px-4 py-2 border-b">{{ $section->elements->where('type', 'text')->count() }}</td>
                                        <td class="px-4 py-2 border-b">{{ $section->elements->where('type', 'image')->count() }}</td>
                                        <td class="px-4 py-2 border-b">
                                            <div class="flex space-x-2">
                                                <!-- Botón Editar -->
                                                <a href="{{ route('pages.sections.edit', [$page_id, $section->id]) }}" 
                                                    class="inline-block px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
                                                    Editar
                                                </a>
                                                <!-- Botón Eliminar -->
                                                <form action="{{ route('pages.sections.destroy', [$page_id, $section->id]) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this section?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                        class="inline-block px-4 py-2 bg-red-600 text-white font-semibold rounded-lg shadow-md hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-400">
                                                        Borrar
                                                    </button>
                                                </form>
                                                <!-- Botón Gestionar Elementos -->
                                                <a href="{{ route('pages.sections.manageElements', [$page_id, $section->id]) }}" 
                                                    class="inline-block px-4 py-2 bg-gray-500 text-white font-semibold rounded-lg shadow-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-400">
                                                    Administrar
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
    
                    <div class="mt-4 flex space-x-4">
                        <!-- Botón Nueva Sección -->
                        <a href="{{ route('pages.sections.create', $page_id) }}" 
                            class="px-4 py-2 bg-green-500 text-white font-semibold rounded-lg shadow-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400">
                            Nueva Sección
                        </a>
                        <!-- Botón Volver a Páginas -->
                        <a href="{{ route('pages.index') }}" 
                            class="px-4 py-2 bg-gray-300 text-gray-700 font-semibold rounded-lg shadow-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-300">
                            Volver a Páginas
                        </a>
                    </div>
    
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
