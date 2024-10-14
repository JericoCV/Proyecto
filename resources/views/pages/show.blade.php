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
                        <a href="{{ route('pages.edit', $page->id) }}" class="btn btn-primary">Edit Page</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>