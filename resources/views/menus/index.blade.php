<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Menu de Página') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container">

                        <a href="{{ route('pages.show', $page->id) }}"
                            class="inline-block bg-blue-500 text-white px-4 py-2 rounded-lg shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50 transition duration-200 mr-2">
                            Atras
                        </a>
                        <h1 class="text-2xl font-semibold text-blue-700 mb-4">Menu: {{ $menu[0]->name }}</h1>
    
                        <div class="mb-6 flex space-x-4">
                            <!-- Botones para Editar y Eliminar el Menú -->
                            <a href="{{ route('pages.menus.edit', [$page->id, $menu[0]->id]) }}" class="bg-green-500 text-white py-2 px-4 rounded-lg shadow hover:bg-yellow-600">
                                Edit Menu
                            </a>
                            <form action="{{ route('pages.menus.destroy', [$page->id, $menu[0]->id]) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 text-white py-2 px-4 rounded-lg shadow hover:bg-red-500" onclick="return confirm('Are you sure you want to delete this menu?');">
                                    Delete Menu
                                </button>
                            </form>
                        </div>
    
                        <h3 class="text-xl font-medium text-gray-800 mb-3">Items in this Menu</h3>
    
                        <table class="min-w-full border-collapse bg-white shadow-lg rounded-lg overflow-hidden">
                            <thead>
                                <tr class="bg-blue-600 text-white">
                                    <th class="py-3 px-6 text-left">Text</th>
                                    <th class="py-3 px-6 text-left">Link</th>
                                    <th class="py-3 px-6 text-left">Order</th>
                                    <th class="py-3 px-6 text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($menu[0]->items as $item)
                                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                                        <td class="py-3 px-6">{{ $item->text }}</td>
                                        <td class="py-3 px-6">{{ $item->link }}</td>
                                        <td class="py-3 px-6">{{ $item->order }}</td>
                                        <td class="py-3 px-6 text-center">
                                            <form action="{{ route('pages.menus.items.destroy', [$page->id, $menu[0]->id, $item->id]) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-600 text-white py-2 px-4 rounded-lg shadow hover:bg-red-500" onclick="return confirm('Are you sure you want to delete this item?');">
                                                    Delete
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
