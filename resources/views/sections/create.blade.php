<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create New Section
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3>Create Section</h3>

                    <form action="{{ route('pages.sections.store', $page_id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Section Title:</label>
                            <input type="text" name="title" id="title" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="order">Order:</label>
                            <input type="number" name="order" id="order" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary mt-4">Create Section</button>
                    </form>

                    <a href="{{ route('pages.sections.index', $page_id) }}" class="btn btn-secondary mt-4">Back to Sections</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
