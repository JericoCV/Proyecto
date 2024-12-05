<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Editar Elemento') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container">
                        <h1 class="text-2xl font-semibold mb-6">Editar Elemento</h1>
    
                        <form action="{{ route('pages.sections.elements.update', [$page_id, $section_id, $element->id]) }}" method="POST" id="element-form" enctype="multipart/form-data">
                            @csrf
                            @method('PUT') {{-- Indica que este formulario realiza una actualización --}}
    
                            <div class="mb-4">
                                <label for="type" class="block text-sm font-medium text-gray-700">Tipo de Elemento:</label>
                                <select name="type" id="type" class="form-control w-full mt-2 px-4 py-2 border rounded-lg" required>
                                    <option value="">Seleccionar</option>
                                    <option value="text" {{ $element->type == 'text' ? 'selected' : '' }}>Texto</option>
                                    <option value="image" {{ $element->type == 'image' ? 'selected' : '' }}>Imagen</option>
                                </select>
                            </div>
    
                            {{-- Formulario para Texto --}}
                            <div id="text-form" class="element-specific-form {{ $element->type == 'text' ? '' : 'hidden' }}">
                                <div class="mb-4">
                                    <label for="text_content" class="block text-sm font-medium text-gray-700">Contenido:</label>
                                    <textarea name="content" id="text_content" class="form-control w-full mt-2 px-4 py-2 border rounded-lg" {{ $element->type == 'text' ? 'required' : '' }}>{{ $element->content }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label for="text_style" class="block text-sm font-medium text-gray-700">Estilo:</label>
                                    <select name="style" id="text_style" class="form-control w-full mt-2 px-4 py-2 border rounded-lg">
                                        <option value="">Seleccionar estilo de texto</option>
                                        <option value="bold" {{ $element->style == 'bold' ? 'selected' : '' }}>Negrita</option>
                                        <option value="italic" {{ $element->style == 'italic' ? 'selected' : '' }}>Cursiva</option>
                                        <option value="underline" {{ $element->style == 'underline' ? 'selected' : '' }}>Subrayado</option>
                                    </select>
                                </div>
                            </div>
    
                            {{-- Formulario para Imagen --}}
                            <div id="image-form" class="element-specific-form {{ $element->type == 'image' ? '' : 'hidden' }}">
                                <div class="mb-4">
                                    <label for="image" class="block text-sm font-medium text-gray-700">Imagen (dejar vacío si no desea cambiarla):</label>
                                    <input type="file" name="image" id="image" class="form-control w-full mt-2 px-4 py-2 border rounded-lg" accept="image/*">
                                </div>
                                <div class="mb-4">
                                    <label for="image_content" class="block text-sm font-medium text-gray-700">Alt Text:</label>
                                    <input type="text" name="alt_text" id="image_content" class="form-control w-full mt-2 px-4 py-2 border rounded-lg" value="{{ $element->alt_text }}" {{ $element->type == 'image' ? 'required' : '' }}>
                                </div>
                                <div class="mb-4">
                                    <label for="image_style" class="block text-sm font-medium text-gray-700">Alineación:</label>
                                    <select name="style" id="image_style" class="form-control w-full mt-2 px-4 py-2 border rounded-lg">
                                        <option value="">Seleccionar</option>
                                        <option value="responsive" {{ $element->style == 'responsive' ? 'selected' : '' }}>Responsivo</option>
                                        <option value="center" {{ $element->style == 'center' ? 'selected' : '' }}>Centro</option>
                                    </select>
                                </div>
                            </div>
    
                            <button type="submit" class="mt-4 bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">Actualizar Elemento</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Error and Success Messages -->
    @if ($errors->any())
        <div class="mt-4 p-4 bg-red-500 text-white rounded-lg">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    @if (session('success'))
        <div class="mt-4 p-4 bg-green-500 text-white rounded-lg">
            {{ session('success') }}
        </div>
    @endif
    
    <script>
        document.getElementById('type').addEventListener('change', function() {
            const selectedType = this.value;
            const forms = document.querySelectorAll('.element-specific-form');
            
            // Hide all specific forms
            forms.forEach(form => form.classList.add('hidden'));
    
            // Reset required attribute
            const textContentField = document.getElementById('text_content');
            const imageField = document.getElementById('image');
            const imageContentField = document.getElementById('image_content');
    
            if (textContentField) textContentField.removeAttribute('required');
            if (imageField) imageField.removeAttribute('required');
            if (imageContentField) imageContentField.removeAttribute('required');
    
            // Show the specific form based on selection
            if (selectedType) {
                const selectedForm = document.getElementById(`${selectedType}-form`);
                selectedForm.classList.remove('hidden'); // Show the selected form
    
                // Set the required attribute only for visible fields
                if (selectedType === 'text') {
                    textContentField.setAttribute('required', 'required');
                } else if (selectedType === 'image') {
                    imageField.setAttribute('required', 'required');
                    imageContentField.setAttribute('required', 'required');
                }
            }
        });
    </script>
</x-app-layout>
