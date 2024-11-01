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
                    {{ __("You're logged in!") }}
                    <h1>Admin Dashboard</h1>
                    <p>Bienvenido, Administrador. {{Illuminate\Support\Facades\Auth::user()->name}}</p>
                </div>
                <div class="options p-6 text-gray-900">
                    <a href="{{route('pages.index')}}">Pages</a><br>
                    <a href="{{route('users.index')}}">Usuarios</a><br>
                    <a href="{{route('courses.index')}}">Courses</a><br>
                    <a href="{{route('moderations.index')}}">Archive Moderations </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>