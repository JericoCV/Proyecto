<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Subir Nuevo Archivo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="p-6 text-gray-900">
                    <!-- Errores de validación -->
                    @if($errors->any())
                        <div class="mb-4 text-red-600">
                            <ul class="list-disc list-inside">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Formulario de subida -->
                    <form action="{{ route('courses.archives.store', $course_id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Nombre del archivo -->
                        <div class="mb-6">
                            <label for="name" class="block text-sm font-medium text-gray-700">
                                Nombre del Archivo
                            </label>
                            <input type="text" name="name" id="name" 
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                   placeholder="Ingrese el nombre del archivo" required>
                        </div>

                        <!-- Archivo PDF -->
                        <div class="mb-6">
                            <label for="file" class="block text-sm font-medium text-gray-700">
                                Archivo PDF
                            </label>
                            <input type="file" name="file" id="file" 
                                   class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" 
                                   accept="application/pdf" required>
                        </div>

                        <!-- Botones -->
                        <div class="flex space-x-4">
                            <button type="submit" 
                                    class="px-4 py-2 bg-blue-600 text-white font-semibold text-sm rounded-md shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Subir Archivo
                            </button>
                            <a href="{{ route('courses.archives.index', $course_id) }}" 
                               class="px-4 py-2 bg-gray-600 text-white font-semibold text-sm rounded-md shadow hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
