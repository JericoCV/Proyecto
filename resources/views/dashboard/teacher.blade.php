<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold text-gray-800 mb-4">Teacher Dashboard</h1>
                    <p class="text-gray-600">Bienvenido, Docente.</p>
                    <a href="{{ route('courses.myCourses') }}" 
                       class="mt-4 inline-block px-6 py-2 bg-blue-600 text-white font-medium text-sm rounded-md shadow hover:bg-blue-700 focus:ring focus:ring-blue-300">
                        Ver Mis Cursos
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
