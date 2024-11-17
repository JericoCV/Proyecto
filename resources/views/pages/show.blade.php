<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ $page->title  }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container space-y-6">
                        <div>
                            <p class="font-semibold text-gray-700">Content:</p>
                            <div class="p-4 bg-gray-100 rounded-md border border-gray-300">{{ $page->content }}</div>
                        </div>
    
                        <div>
                            <p class="font-semibold text-gray-700">Creation Date:</p>
                            <p class="text-gray-600">{{ $page->creation_date ? \Carbon\Carbon::parse($page->creation_date)->format('Y-m-d') : 'N/A' }}</p>
                        </div>
    
                        <div>
                            <p class="font-semibold text-gray-700">Administrator ID:</p>
                            <p class="text-gray-600">{{ $page->Administrator_id }}</p>
                        </div>
    
                        <!-- Botones principales -->
                        <div class="flex flex-wrap gap-4">
                            <a href="{{ route('pages.index') }}" 
                               class="px-4 py-2 bg-gray-300 text-gray-800 rounded-lg shadow hover:bg-gray-400 transition duration-200">
                               Back to Pages
                            </a>
                            @if (isset($menu))
                            <a href="{{ route('pages.menus.index', [$page->id, $menu->id]) }}" 
                               class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition duration-200">
                               Manage Menu
                            </a>
                            @else
                            <a href="{{ route('pages.menus.create', $page->id) }}" 
                               class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition duration-200">
                               New Menu
                            </a>
                            @endif
                            <a href="{{ route('pages.sections.index', $page->id) }}" 
                               class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition duration-200">
                               Manage Sections
                            </a>
                        </div>
    
                        <!-- Gestión de plantillas -->
                        <h1 class="text-lg font-bold text-gray-800 mt-6">Manage Templates</h1>
                        
                        <div class="flex flex-wrap gap-4">
                            <button id="add-template-btn" 
                                    class="px-4 py-2 bg-green-600 text-white rounded-lg shadow hover:bg-green-700 transition duration-200">
                                    Add Template
                            </button>
                            <button id="cancel-template-btn" 
                                    class="px-4 py-2 bg-red-600 text-white rounded-lg shadow hover:bg-red-700 transition duration-200 hidden">
                                    Cancel
                            </button>
                        </div>
    
                        <form action="{{ route('pages.addTemplate', ['page' => $page->id]) }}" 
                              method="POST" 
                              id="template-form" 
                              class="space-y-4 mt-4 bg-gray-50 p-4 rounded-md shadow-md border border-gray-200 hidden"
                              aria-hidden="true">
                            @csrf
                            <div>
                                <label for="template" class="block text-gray-700 font-medium mb-2">Select Template:</label>
                                <select name="template_id" id="template" 
                                        class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                                        required>
                                    @foreach($templates as $template)
                                    <option value="{{ $template->id }}">{{ $template->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" 
                                    class="px-6 py-2 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-700 transition duration-200">
                                    Add Template
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        const addTemplateBtn = document.getElementById('add-template-btn');
        const cancelTemplateBtn = document.getElementById('cancel-template-btn');
        const templateForm = document.getElementById('template-form');
    
        addTemplateBtn.addEventListener('click', () => {
            // Mostrar el formulario
            templateForm.classList.remove('hidden');
            templateForm.setAttribute('aria-hidden', 'false');
    
            // Alternar visibilidad de botones
            addTemplateBtn.classList.add('hidden');
            cancelTemplateBtn.classList.remove('hidden');
        });
    
        cancelTemplateBtn.addEventListener('click', () => {
            // Ocultar el formulario
            templateForm.classList.add('hidden');
            templateForm.setAttribute('aria-hidden', 'true');
    
            // Alternar visibilidad de botones
            addTemplateBtn.classList.remove('hidden');
            cancelTemplateBtn.classList.add('hidden');
        });
    </script>
    
</x-app-layout>