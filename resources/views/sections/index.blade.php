<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Sections
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3>Sections</h3>

                    @if($sections->isEmpty())
                        <p>No sections found for this page.</p>
                    @else
                        <table class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th>Section Title</th>
                                    <th>Order</th>
                                    <th>Text Elements</th>
                                    <th>Image Elements</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sections as $section)
                                    <tr>
                                        <td>{{ $section->title }}</td>
                                        <td>{{ $section->order }}</td>
                                        <td>{{ $section->elements->where('type', 'text')->count() }}</td>
                                        <td>{{ $section->elements->where('type', 'image')->count() }}</td>
                                        <td>
                                            <a href="{{ route('pages.sections.edit', [$page_id, $section->id]) }}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('pages.sections.destroy', [$page_id, $section->id]) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                            <a href="{{ route('pages.sections.manageElements', [$page_id, $section->id]) }}" class="btn btn-secondary">Manage Elements</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif

                    <a href="{{ route('pages.sections.create', $page_id) }}" class="btn btn-primary mt-4">New Section</a>
                    <a href="{{ route('pages.index') }}" class="btn btn-secondary mt-4">Back to Pages</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
