<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Menu') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container">
                        <h1>Edit Menu</h1>

                        <form action="{{ route('pages.menus.update', [$page_id, $menu->id]) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">Menu Name:</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    value="{{ old('name', $menu->name) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="position">Position:</label>
                                <select name="position" id="position" class="form-control" required>
                                    <option value="0" {{ $menu->position == 0 ? 'selected' : '' }}>Left</option>
                                    <option value="1" {{ $menu->position == 1 ? 'selected' : '' }}>Right</option>
                                </select>
                            </div>

                            <input type="hidden" name="page_id" value="{{ $page_id }}">

                            <h3>Menu Items</h3>

                            <div id="items-container" class="sortable-list">
                                @foreach($menu->items as $index => $item)
                                <div class="item-form">
                                    <hr>
                                    <div class="form-group">
                                        <label for="items[{{ $index }}][text]">Item Text:</label>
                                        <input type="text" name="items[{{ $index }}][text]" class="form-control"
                                            value="{{ old(" items.$index.text", $item->text) }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="items[{{ $index }}][link]">Item Link:</label>
                                        <input type="url" name="items[{{ $index }}][link]" class="form-control"
                                            value="{{ old(" items.$index.link", $item->link) }}" required>
                                    </div>
                                    <input type="hidden" name="items[{{ $index }}][order]" value="{{ $index }}">
                                    <!-- Almacena el orden -->
                                </div>
                                @endforeach
                            </div>

                            <button type="button" id="add-item" class="btn btn-secondary">Add Item</button>
                            <button type="submit" class="btn btn-primary">Update Menu</button>
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
            <div class="item-form">
                <hr>
                <div class="form-group">
                    <label for="items[${itemIndex}][text]">Item Text:</label>
                    <input type="text" name="items[${itemIndex}][text]" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="items[${itemIndex}][link]">Item Link:</label>
                    <input type="url" name="items[${itemIndex}][link]" class="form-control" required>
                </div>
                <input type="hidden" name="items[${itemIndex}][order]" value="${itemIndex}"> <!-- Almacena el orden -->
            </div>
        `;

        document.getElementById('items-container').insertAdjacentHTML('beforeend', newItemForm);
        itemIndex++;
    });
    </script>
</x-app-layout>