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
                    <h1>Edit Page: {{ $page->title }}</h1>

                    <form action="{{ route('pages.update', $page->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" name="title" id="title" class="form-control"
                                value="{{ old('title', $page->title) }}" required>
                            @error('title')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="content">Content:</label>
                            <textarea name="content" id="content" class="form-control"
                                required>{{ old('content', $page->content) }}</textarea>
                            @error('content')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="creation_date">Creation Date:</label>
                            <input type="date" name="creation_date" id="creation_date" class="form-control"
                                value="{{ old('creation_date', $page->creation_date ? \Carbon\Carbon::parse($page->creation_date)->format('Y-m-d') : '') }}">
                            @error('creation_date')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <input type="hidden" name="Administrator_id" value="{{ old('Administrator_id', $page->Administrator_id) }}">

                        <button type="submit" class="btn btn-primary">Update Page</button>
                        <a href="{{ route('pages.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>