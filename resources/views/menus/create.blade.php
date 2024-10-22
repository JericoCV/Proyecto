<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
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
                                    <option value="0" selected="selected">Left</option>
                                    <option value="1">Right</option>
                                </select>
                            </div>

                            <input type="hidden" name="page_id" id="page_id" class="form-control" value="{{$page_id}}">

                            <h3>Menu Items (Drag to reorder)</h3>

                            <div id="items-container" class="sortable-list">
                                <div class="item-form" data-index="0">
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
                <div class="item-form" data-index="${itemIndex}">
                    <hr>
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
            `;

            document.getElementById('items-container').insertAdjacentHTML('beforeend', newItemForm);
            itemIndex++;
        });

        // Inicializar Sortable.js para hacer los elementos arrastrables
        let sortable = new Sortable(document.getElementById('items-container'), {
            animation: 150,
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
