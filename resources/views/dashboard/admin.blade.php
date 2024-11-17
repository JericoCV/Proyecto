<x-app-layout>  
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-light-600 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                <div class="p-6">
                    <h1 class="text-xl font-bold text-blue-700">Admin Dashboard</h1>
                    <p class="text-gray-600 mb-4">Bienvenido, Administrador. {{ Illuminate\Support\Facades\Auth::user()->name }}</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Options Section -->
                        <div class="bg-blue-800 rounded-lg p-6 shadow-md">
                            <h3 class="text-lg font-semibold text-white mb-3">Opciones</h3>
                            <ul class="space-y-2">
                                <li>
                                    <a href="{{ route('pages.index') }}" class="inline-block px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition">
                                        Pages
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('users.index') }}" class="inline-block px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition">
                                        Usuarios
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('courses.index') }}" class="inline-block px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition">
                                        Courses
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('moderations.index') }}" class="inline-block px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition">
                                        Archive Moderations
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <!-- Welcome Section -->
                        <div class="bg-red-100 rounded-lg p-6 shadow-md">
                            <p class="text-lg font-semibold text-red-800">You're logged in!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
