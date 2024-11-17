<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Editar Menu') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container">
                        <h1 class="text-2xl font-semibold text-blue-700 mb-4">Edit Menu</h1>
    
                        <form action="{{ route('pages.menus.update', [$page_id, $menu->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
    
                            <div class="form-group mb-4">
                                <label for="name" class="block text-sm font-medium text-gray-700">Menu Name:</label>
                                <input type="text" name="name" id="name" class="form-control w-full px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" 
                                    value="{{ old('name', $menu->name) }}" required>
                            </div>
    
                            <div class="form-group mb-4">
                                <label for="position" class="block text-sm font-medium text-gray-700">Position:</label>
                                <select name="position" id="position" class="form-control w-full px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                    <option value="0" {{ $menu->position == 0 ? 'selected' : '' }}>Left</option>
                                    <option value="1" {{ $menu->position == 1 ? 'selected' : '' }}>Right</option>
                                </select>
                            </div>
    
                            <input type="hidden" name="page_id" value="{{ $page_id }}">
    
                            <h3 class="text-xl font-medium text-gray-800 mb-3">Menu Items</h3>
    
                            <div id="items-container" class="sortable-list space-y-4">
                                @foreach($menu->items as $index => $item)
                                    <div class="item-form p-4 bg-gray-50 rounded-lg shadow-sm flex items-center justify-between hover:bg-gray-100 cursor-pointer">
                                        <div class="drag-handle text-gray-500 mr-4">
                                            <!-- Icono para arrastrar -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                                            </svg>
                                        </div>
    
                                        <div class="flex-1">
                                            <div class="form-group mb-4">
                                                <label for="items[{{ $index }}][text]" class="block text-sm font-medium text-gray-700">Item Text:</label>
                                                <input type="text" name="items[{{ $index }}][text]" class="form-control w-full px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" 
                                                    value="{{ old('items.' . $index . '.text', $item->text) }}" required>
                                            </div>
    
                                            <div class="form-group mb-4">
                                                <label for="items[{{ $index }}][link]" class="block text-sm font-medium text-gray-700">Item Link:</label>
                                                <input type="url" name="items[{{ $index }}][link]" class="form-control w-full px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" 
                                                    value="{{ old('items.' . $index . '.link', $item->link) }}" required>
                                            </div>
                                            <input type="hidden" name="items[{{ $index }}][order]" value="{{ $index }}">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
    
                            <button type="button" id="add-item" class="bg-blue-500 text-white py-2 px-4 rounded-lg shadow hover:bg-blue-600">Add Item</button>
                            <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded-lg shadow hover:bg-green-600">Update Menu</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
    <script>
        let itemIndex = {{ count($menu->items) }};
        // Habilitar Sortable.js en el contenedor de ítems
        new Sortable(document.getElementById('items-container'), {
            animation: 150,
            handle: '.drag-handle', // Usar el área del icono para el arrastre
            onEnd: function(evt) {
                // Actualizar los índices de los elementos al reordenar
                const items = document.querySelectorAll('.item-form');
                items.forEach((item, index) => {
                    const inputOrder = item.querySelector('input[type="hidden"][name^="items"]');
                    if (inputOrder) {
                        inputOrder.value = index; // Actualiza el valor de order
                    }
                });
            }
        });
    
        document.getElementById('add-item').addEventListener('click', function() {
            let newItemForm = `
                <div class="item-form p-4 bg-gray-50 rounded-lg shadow-sm flex items-center justify-between hover:bg-gray-100 cursor-pointer">
                    <div class="drag-handle text-gray-500 mr-4">
                        <!-- Icono para arrastrar -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                    </div>
    
                    <div class="flex-1">
                        <div class="form-group mb-4">
                            <label for="items[${itemIndex}][text]" class="block text-sm font-medium text-gray-700">Item Text:</label>
                            <input type="text" name="items[${itemIndex}][text]" class="form-control w-full px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
    
                        <div class="form-group mb-4">
                            <label for="items[${itemIndex}][link]" class="block text-sm font-medium text-gray-700">Item Link:</label>
                            <input type="url" name="items[${itemIndex}][link]" class="form-control w-full px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        <input type="hidden" name="items[${itemIndex}][order]" value="${itemIndex}"> <!-- Almacena el orden -->
                    </div>
                </div>
            `;
    
            document.getElementById('items-container').insertAdjacentHTML('beforeend', newItemForm);
            itemIndex++;
        });
    </script>
    
    
</x-app-layout>