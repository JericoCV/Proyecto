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
                    <form action="{{ route('pages.store') }}" method="POST">
                        @csrf
                        <div>
                            <label for="title">Title:</label>
                            <input type="text" name="title" id="title" required>
                        </div>

                        <div>
                            <label for="content">Content:</label>
                            <textarea name="content" id="content" required></textarea>
                        </div>

                        <!-- Creation Date will be set automatically -->
                        <input type="hidden" name="creation_date" value="{{ now()->format('Y-m-d H:i:s') }}">

                        <!-- Hidden input for Administrator ID -->
                        <input type="hidden" name="Administrator_id" value="{{ auth()->user()->id }}">
                        <button type="submit">Create Page</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>