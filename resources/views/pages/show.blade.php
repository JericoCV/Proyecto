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
                        <h1>{{ $page->title }}</h1>

                        <p><strong>Content:</strong></p>
                        <div>{{ $page->content }}</div>

                        <p><strong>Creation Date:</strong> {{ $page->creation_date ?
                            \Carbon\Carbon::parse($page->creation_date)->format('Y-m-d') : 'N/A' }}</p>

                        <p><strong>Administrator ID:</strong> {{ $page->Administrator_id }}</p>

                        <a href="{{ route('pages.index') }}" class="btn btn-secondary">Back to Pages</a>
                        @if (isset($menu))
                        <a href="{{ route('pages.menus.index', [$page->id, $menu->id]) }}"
                            class="btn btn-primary">Manage
                            Menu</a>
                        @else
                        <a href="{{ route('pages.menus.create', $page->id) }}" class="btn btn-primary">New Menu</a>
                        @endif
                        <a href="{{ route('pages.sections.index', $page->id) }}" class="btn btn-primary">Manage
                            Sections</a>
                        <h1>Manage Templates</h1>

                        <!-- Botón para mostrar el formulario -->
                        <button id="add-template-btn" class="btn btn-primary">Add Template</button>
                        <button id="cancel-template-btn" class="btn btn-secondary"
                            style="display: none;">Cancel</button>

                        <form action="{{ route('pages.addTemplate', ['page' => $page->id]) }}" method="POST"
                            id="template-form" style="display: none;">
                            @csrf
                            <div class="form-group">
                                <label for="template">Select Template:</label>
                                <select name="template_id" id="template" class="form-control" required>
                                    @foreach($templates as $template)
                                    <option value="{{ $template->id }}">{{ $template->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit">Add Template</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('add-template-btn').addEventListener('click', function() {
            // Mostrar el formulario y el botón de cancelar
            document.getElementById('template-form').style.display = 'block';
            document.getElementById('cancel-template-btn').style.display = 'inline-block';

            // Ocultar el botón de agregar plantilla
            this.style.display = 'none';
        });

        document.getElementById('cancel-template-btn').addEventListener('click', function() {
            // Ocultar el formulario y el botón de cancelar
            document.getElementById('template-form').style.display = 'none';
            this.style.display = 'none';

            // Volver a mostrar el botón de agregar plantilla
            document.getElementById('add-template-btn').style.display = 'inline-block';
        });
    </script>
</x-app-layout>