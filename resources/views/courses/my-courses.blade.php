<!-- resources/views/courses/my-courses.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Mis Cursos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="p-6 text-gray-900">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Cursos que dictas</h3>

                    @if($courses->isEmpty())
                        <div class="text-center text-gray-500">
                            <p>No tienes cursos asignados.</p>
                        </div>
                    @else
                        <ul class="space-y-4">
                            @foreach($courses as $course)
                                <li class="flex items-center justify-between bg-gray-100 p-4 rounded-md shadow-sm hover:bg-gray-200">
                                    <span class="text-lg font-medium text-gray-700">
                                        {{ $course->name }}
                                    </span>
                                    <a href="{{ route('courses.myCourse', $course->id) }}" 
                                       class="px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md shadow hover:bg-blue-700 focus:ring focus:ring-blue-300">
                                        Ver Curso
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
