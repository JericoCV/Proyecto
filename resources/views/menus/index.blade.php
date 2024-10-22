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
                        <h1>Menu: {{ $menu[0]->name }}</h1>

                        <div class="mb-3">
                            <!-- Botones para Editar y Eliminar el Menú -->
                            <a href="{{ route('pages.menus.edit', [$page->id, $menu[0]->id]) }}"
                                class="btn btn-warning">Edit Menu</a>
                            <form action="{{ route('pages.menus.destroy', [$page->id, $menu[0]->id]) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete Menu</button>
                            </form>
                        </div>

                        <h3>Items in this Menu</h3>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Text</th>
                                    <th>Link</th>
                                    <th>Order</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($menu[0]->items as $item)
                                <tr>
                                    <td>{{ $item->text }}</td>
                                    <td>{{ $item->link }}</td>
                                    <td>{{ $item->order }}</td>
                                    <td>
                                        <!-- Botones para Editar y Eliminar cada ítem -->
                                        <form action="{{ route('pages.menus.items.destroy', [$page->id, $menu[0]->id, $item->id]) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this page?');">Delete</button>
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
    </div>
</x-app-layout>
