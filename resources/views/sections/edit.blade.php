<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Section 
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3>Edit Section</h3>

                    <form action="{{ route('pages.sections.update', [$page_id, $section->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Section Title:</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ $section->title }}" required>
                        </div>

                        <div class="form-group">
                            <label for="order">Order:</label>
                            <input type="number" name="order" id="order" class="form-control" value="{{ $section->order }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary mt-4">Update Section</button>
                    </form>

                    <a href="{{ route('pages.sections.index', [$page_id, $section->id]) }}" class="btn btn-secondary mt-4">Back to Sections</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
