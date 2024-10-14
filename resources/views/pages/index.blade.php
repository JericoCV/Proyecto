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
                    <h1>Pages</h1>

                    <a href="{{ route('pages.create') }}" class="btn btn-primary mb-3">Create Page</a>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Creation Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pages as $page)
                            <tr>
                                <td>{{ $page->id }}</td>
                                <td>{{ $page->title }}</td>
                                <td>{{ $page->creation_date ?
                                    \Carbon\Carbon::parse($page->creation_date)->format('Y-m-d') : 'N/A' }}</td>
                                <td>
                                    <a href="{{ route('pages.edit', $page->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <a href="{{ route('pages.show', $page->id) }}"
                                        class="btn btn-warning btn-sm">Manage</a>
                                    <form action="{{ route('pages.destroy', $page->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this page?');">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>