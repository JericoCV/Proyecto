<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Dashboard del Estudiante') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-4">Bienvenido, {{ Auth::user()->name }}</h1>
                    <p class="text-gray-700 mb-6">Este es tu espacio para acceder a tus cursos y actividades.</p>

                    <a href="{{ route('student.courses') }}" 
                       class="px-4 py-2 bg-blue-600 text-white font-semibold text-sm rounded-md shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Ver tus Cursos
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
