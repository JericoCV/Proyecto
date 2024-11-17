<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Elementos de la Sección
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-2xl font-semibold mb-4">Puedes cambiar el orden de los elementos arrastrandolos</h3>

                    <ul id="sortable-elements" class="space-y-4">
                        @foreach($elements as $element)
                        <li class="sortable-item p-4 border border-gray-300 rounded-lg shadow-sm hover:bg-gray-50"
                            data-id="{{ $element->id }}">
                            <div class="flex justify-between items-center">
                                <div>
                                    <strong>Tipo:</strong> {{ ucfirst($element->type) }} |
                                    <strong>Orden:</strong> {{ $element->order }} |
                                    <strong>URL:</strong> {{ $element->image_path }}
                                </div>
                                <form
                                    action="{{ route('pages.sections.elements.destroy', [$page_id, $section_id, $element->id]) }}"
                                    method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="ml-4 text-white bg-red-600 hover:bg-red-500 rounded px-3 py-1 focus:outline-none focus:ring-2 focus:ring-red-400">Delete</button>
                                </form>
                            </div>
                        </li>
                        @endforeach
                    </ul>

                    <a href="{{ route('pages.sections.elements.create', [$page_id, $section_id]) }}"
                        class="inline-block mt-4 py-2 px-4 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">Add
                        Añadir</a>
                    <a href="{{ route('pages.sections.index', [$page_id, $section_id]) }}"
                        class="inline-block mt-4 ml-4 py-2 px-4 bg-gray-300 text-gray-700 font-semibold rounded-lg shadow-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-300">Volver
                        a Secciones</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Sortable.js -->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.14.0/Sortable.min.js"></script>
    <script>
        // Initialize Sortable for drag-and-drop reordering
        let sortable = new Sortable(document.getElementById('sortable-elements'), {
            animation: 150,
            onEnd: function() {
                updateElementOrder();
            }
        });
    
       
    // Asumimos que $section_id está disponible en la vista
    let sectionId = {{ $section_id }};
    
    // Función para actualizar el orden después de mover los elementos
function updateElementOrder() {
    let items = document.querySelectorAll('.sortable-item');
    let sectionId = {{ $section_id }};  // Asegúrate de que esta variable esté disponible

    items.forEach((item, index) => {
        let elementId = item.getAttribute('data-id');

        // Enviar la nueva posición al backend
        fetch(`/pages/sections/${sectionId}/elements/${elementId}/update-order`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ order: index })
        })
        .then(response => response.json())
        .then(data => {
            console.log(data.message); // Muestra el mensaje en la consola
            if (data.elements) {
                updateTable(data.elements);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
}

// Función para actualizar la tabla con los nuevos elementos ordenados
function updateTable(elements) {
    let tableBody = document.querySelector('#sortable-elements');
    tableBody.innerHTML = ''; // Limpiar la tabla antes de actualizar

    // Agregar los elementos ordenados a la tabla
    elements.forEach(element => {
        let itemHtml = `
            <li class="sortable-item p-4 border border-gray-300 rounded-lg shadow-sm hover:bg-gray-50" data-id="${element.id}">
                <div class="flex justify-between items-center">
                    <div>
                        <strong>Type:</strong> ${element.type} | 
                        <strong>Order:</strong> ${element.order} |
                        <strong>URL:</strong> ${element.image_path}
                    </div>
                    <form action="/pages/sections/${sectionId}/elements/${element.id}/destroy" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="ml-4 text-white bg-red-600 hover:bg-red-500 rounded px-3 py-1 focus:outline-none focus:ring-2 focus:ring-red-400">Delete</button>
                    </form>
                </div>
            </li>
        `;
        tableBody.insertAdjacentHTML('beforeend', itemHtml);
    });
}

    </script>

</x-app-layout>