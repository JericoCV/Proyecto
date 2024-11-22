<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Nuevo Curso') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
    
                    <div class="container">
                        <h1 class="text-3xl font-bold mb-4">Crear Curso</h1>
                    
                        @if ($errors->any())
                            <div class="bg-red-100 text-red-700 border-l-4 border-red-500 p-4 mb-4">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    
                        <form action="{{ route('courses.store') }}" method="POST" class="space-y-6">
                            @csrf
                            <div>
                                <label for="name" class="block text-lg font-medium text-gray-700">Nombre del curso</label>
                                <input type="text" name="name" id="name" class="mt-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2" required>
                            </div>
    
                            <div>
                                <label for="level" class="block text-lg font-medium text-gray-700">Nivel</label>
                                <select name="level" id="level" class="mt-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2" required>
                                    <option value="basico">Básico</option>
                                    <option value="pre-intermedio">Pre-Intermedio</option>
                                    <option value="intermedio">Intermedio</option>
                                    <option value="intermedio-alto">Intermedio Alto</option>
                                    <option value="avanzado">Avanzado</option>
                                </select>
                            </div>
    
                            <div>
                                <label for="mode" class="block text-lg font-medium text-gray-700">Modalidad</label>
                                <select name="mode" id="mode" class="mt-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2" required>
                                    <option value="virtual">Virtual</option>
                                    <option value="presencial">Presencial</option>
                                    <option value="hibrido">Híbrido</option>
                                </select>
                            </div>

                            <div>
                                <label for="teacher_id" class="block text-lg font-medium text-gray-700">Profesor</label>
                                <select name="teacher_id" id="teacher_id" class="mt-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2">
                                    @foreach($teachers as $teacher)
                                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                    @endforeach
                                </select>
                            </div>
    
                            <div class="flex items-center justify-end space-x-4">
                                <button type="submit" class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-md shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    Guardar
                                </button>
                                <a href="{{ route('courses.index') }}" class="px-6 py-2 bg-gray-400 text-gray-900 font-semibold rounded-md shadow-md hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-500">
                                    Cancelar
                                </a>
                            </div>
                        </form>
                    </div>
    
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>