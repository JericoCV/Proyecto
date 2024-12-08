<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Menus') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Mensajes de éxito -->
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <!-- Mensajes de error -->
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Contenido principal -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container">
                        <h1 class="text-2xl font-bold mb-4">Create New Menu</h1>

                        <!-- Formulario de creación de menú -->
                        <form action="{{ route('pages.menus.store', $page_id) }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="name" class="block text-gray-700 font-bold mb-2">Menu Name:</label>
                                <input type="text" name="name" id="name" class="form-control w-full border rounded-md px-4 py-2" required>
                            </div>

                            <div class="mb-4">
                                <label for="position" class="block text-gray-700 font-bold mb-2">Position:</label>
                                <select name="position" id="position" class="form-control w-full border rounded-md px-4 py-2" required>
                                    <option value="top-left" selected="selected">Left</option>
                                    <option value="top-right">Right</option>
                                </select>
                            </div>

                            <input type="hidden" name="page_id" id="page_id" value="{{ $page_id }}">

                            <!-- Items del menú -->
                            <h3 class="text-lg font-semibold mb-4">Menu Items (Drag to reorder)</h3>

                            <div id="items-container" class="sortable-list space-y-4">
                                <div class="item-form flex items-center justify-between p-4 bg-gray-100 rounded-lg shadow-sm cursor-move" data-index="0">
                                    <div class="drag-handle text-gray-500 mr-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <div class="mb-2">
                                            <label for="items[0][text]" class="block text-gray-700 font-bold mb-1">Item Text:</label>
                                            <input type="text" name="items[0][text]" class="form-control w-full border rounded-md px-4 py-2" required>
                                        </div>

                                        <div class="mb-2">
                                            <label for="items[0][link]" class="block text-gray-700 font-bold mb-1">Item Link:</label>
                                            <input type="url" name="items[0][link]" class="form-control w-full border rounded-md px-4 py-2" required>
                                        </div>

                                        <input type="hidden" name="items[0][order]" class="item-order" value="0">
                                    </div>
                                </div>
                            </div>

                            <!-- Botones para agregar ítems -->
                            <button type="button" id="add-item" class="bg-gray-500 text-white px-4 py-2 rounded-md mt-4 hover:bg-gray-700">
                                Add Item
                            </button>

                            <!-- Botón de enviar -->
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md mt-4 hover:bg-blue-700">
                                Create Menu
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script para la funcionalidad de arrastrar -->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.14.0/Sortable.min.js"></script>
    <script>
        let itemIndex = 1;

        // Función para agregar un nuevo ítem
        document.getElementById('add-item').addEventListener('click', function() {
            let newItemForm = `
                <div class="item-form flex items-center justify-between p-4 bg-gray-100 rounded-lg shadow-sm cursor-move" data-index="${itemIndex}">
                    <div class="drag-handle text-gray-500 mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <div class="mb-2">
                            <label for="items[${itemIndex}][text]" class="block text-gray-700 font-bold mb-1">Item Text:</label>
                            <input type="text" name="items[${itemIndex}][text]" class="form-control w-full border rounded-md px-4 py-2" required>
                        </div>
                        <div class="mb-2">
                            <label for="items[${itemIndex}][link]" class="block text-gray-700 font-bold mb-1">Item Link:</label>
                            <input type="url" name="items[${itemIndex}][link]" class="form-control w-full border rounded-md px-4 py-2" required>
                        </div>
                        <input type="hidden" name="items[${itemIndex}][order]" class="item-order" value="${itemIndex}">
                    </div>
                </div>
            `;
            document.getElementById('items-container').insertAdjacentHTML('beforeend', newItemForm);
            itemIndex++;
        });

        // Inicializar Sortable.js
        new Sortable(document.getElementById('items-container'), {
            animation: 150,
            handle: '.drag-handle',
            onEnd: function() {
                let items = document.querySelectorAll('.item-form');
                items.forEach((item, index) => {
                    item.querySelector('.item-order').value = index;
                });
            }
        });
    </script>
</x-app-layout>
