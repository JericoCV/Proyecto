<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Crear Nueva Actividad') }}
        </h2>
    </x-slot> 

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold mb-6">Crear Actividades Finales para {{ $course->name }}</h3>

                    <!-- Errores de Validación -->
                    @if($errors->any())
                        <div class="mb-4 text-red-600">
                            <ul class="list-disc list-inside">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Formulario -->
                    <form action="{{ route('activities.store', $course->id) }}" method="POST">
                        @csrf

                        <!-- Nombre de la Actividad -->
                        <div class="mb-4">
                            <label for="month" class="block text-sm font-medium text-gray-700">
                                Mes de actividades:
                            </label>
                            <select name="month" id="month" class="form-control" required>
                                <option value="" disabled selected>Seleccione un mes</option>
                                @foreach($availableMonths as $month)
                                    <option value="{{ $month }}">{{ $month }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Botones -->
                        <div class="flex justify-end space-x-4 mt-6">
                            <a href="{{ route('courses.myCourse', $course->id) }}" 
                               class="px-4 py-2 bg-gray-500 text-white font-semibold text-sm rounded-md shadow hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                Cancelar
                            </a>
                            <button type="submit" 
                                    class="px-4 py-2 bg-blue-600 text-white font-semibold text-sm rounded-md shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Crear Actividades del Mes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

