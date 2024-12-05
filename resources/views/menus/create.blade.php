<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Nuevo Menú') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container">
                        <h1>Create New Menu</h1>
    
                        <form action="{{ route('pages.menus.store', $page_id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Menu Name:</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
    
                            <div class="form-group">
                                <label for="position">Position:</label>
                                <select name="position" id="position" class="form-control" required>
                                    <option value="top-left" selected="selected">Left</option>
                                    <option value="top-right">Right</option>
                                </select>
                            </div>
    
                            <input type="hidden" name="page_id" id="page_id" class="form-control" value="{{$page_id}}">
    
                            <h3>Menu Items (Drag to reorder)</h3>
    
                            <div id="items-container" class="sortable-list space-y-4">
                                <div class="item-form flex items-center justify-between p-4 bg-gray-100 rounded-lg shadow-sm cursor-move" data-index="0">
                                    <div class="drag-handle text-gray-500 mr-4">
                                        <!-- Icono de arrastre -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                                        </svg>
                                    </div>
    
                                    <div class="flex-1">
                                        <div class="form-group">
                                            <label for="items[0][text]">Item Text:</label>
                                            <input type="text" name="items[0][text]" class="form-control" required>
                                        </div>
    
                                        <div class="form-group">
                                            <label for="items[0][link]">Item Link:</label>
                                            <input type="url" name="items[0][link]" class="form-control" required>
                                        </div>
    
                                        <input type="hidden" name="items[0][order]" class="item-order" value="0">
                                    </div>
                                </div>
                            </div>
    
                            <button type="button" id="add-item" class="btn btn-secondary">Add Item</button>
    
                            <button type="submit" class="btn btn-primary">Create Menu</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.14.0/Sortable.min.js"></script>
    <script>
        let itemIndex = 1;
    
        // Función para agregar un nuevo item
        document.getElementById('add-item').addEventListener('click', function() {
            let newItemForm = `
                <div class="item-form flex items-center justify-between p-4 bg-gray-100 rounded-lg shadow-sm cursor-move" data-index="${itemIndex}">
                    <div class="drag-handle text-gray-500 mr-4">
                        <!-- Icono de arrastre -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                    </div>
    
                    <div class="flex-1">
                        <div class="form-group">
                            <label for="items[${itemIndex}][text]">Item Text:</label>
                            <input type="text" name="items[${itemIndex}][text]" class="form-control" required>
                        </div>
    
                        <div class="form-group">
                            <label for="items[${itemIndex}][link]">Item Link:</label>
                            <input type="url" name="items[${itemIndex}][link]" class="form-control" required>
                        </div>
    
                        <input type="hidden" name="items[${itemIndex}][order]" class="item-order" value="${itemIndex}">
                    </div>
                </div>
            `;
    
            document.getElementById('items-container').insertAdjacentHTML('beforeend', newItemForm);
            itemIndex++;
        });
    
        // Inicializar Sortable.js para hacer los elementos arrastrables
        let sortable = new Sortable(document.getElementById('items-container'), {
            animation: 150,
            handle: '.drag-handle', // Área de arrastre
            onEnd: function() {
                updateItemOrder();
            }
        });
    
        // Actualiza los valores de "order" después de mover los elementos
        function updateItemOrder() {
            let items = document.querySelectorAll('.item-form');
            items.forEach((item, index) => {
                item.querySelector('.item-order').value = index;
            });
        }
    </script>
    
</x-app-layout>
