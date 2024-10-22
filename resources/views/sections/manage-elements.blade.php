<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Manage Elements 
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3>Manage Elements</h3>

                    <ul id="sortable-elements">
                        @foreach($elements as $element)
                            <li class="sortable-item" data-id="{{ $element->id }}">
                                <strong>Type:</strong> {{ ucfirst($element->type) }} | 
                                <strong>Order:</strong> {{ $element->order }}
                                <strong>URL:</strong> {{ $element->image_path }}
                                <form action="{{ route('pages.sections.elements.destroy', [$page_id, $section_id, $element->id]) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </li>
                        @endforeach
                    </ul>

                    <a href="{{ route('pages.sections.elements.create', [$page_id, $section_id]) }}" class="btn btn-primary mt-4">Add New Element</a>
                    <a href="{{ route('pages.sections.index', [$page_id, $section_id]) }}" class="btn btn-secondary mt-4">Back to Sections</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
</x-app-layout>
