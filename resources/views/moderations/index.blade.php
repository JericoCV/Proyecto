<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Moderaciones Pendientes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th>Archivo</th>
                                <th>Subido por</th>
                                <th>Fecha de subida</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($moderations as $moderation)
                                <tr>
                                    <td>{{ $moderation->archive->name }}</td>
                                    <td>{{ $moderation->archive->mail }}</td>
                                    <td>{{ $moderation->archive->upload_date }}</td>
                                    <td>
                                        <a href="{{ route('moderations.show', $moderation->id) }}" class="btn btn-primary">Revisar</a>
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
