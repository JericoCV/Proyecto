<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Moderaciones Pendientes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    @if(session('success'))
                        <div class="bg-green-100 text-green-700 border-l-4 border-green-500 p-4 mb-4">
                            {{ session('success') }}
                        </div>
                    @endif
    
                    <table class="min-w-full table-auto bg-white shadow-md rounded-lg overflow-hidden">
                        <thead>
                            <tr class="bg-gray-100 text-left text-sm font-semibold text-gray-700">
                                <th class="px-4 py-3">Archivo</th>
                                <th class="px-4 py-3">Subido por</th>
                                <th class="px-4 py-3">Fecha de subida</th>
                                <th class="px-4 py-3">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($moderations as $moderation)
                                <tr class="border-t border-gray-200">
                                    <td class="px-4 py-3 text-gray-700">{{ $moderation->archive->name }}</td>
                                    <td class="px-4 py-3 text-gray-700">{{ $moderation->archive->mail }}</td>
                                    <td class="px-4 py-3 text-gray-700">{{ $moderation->archive->upload_date }}</td>
                                    <td class="px-4 py-3">
                                        <a href="{{ route('moderations.show', $moderation->id) }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                            Revisar
                                        </a>
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
