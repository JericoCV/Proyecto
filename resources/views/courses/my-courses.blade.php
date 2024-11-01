<!-- resources/views/courses/my-courses.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mis Cursos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">Cursos que dictas</h3>
                    
                    @if($courses->isEmpty())
                        <p>No tienes cursos asignados.</p>
                    @else
                        <ul class="list-disc list-inside">
                            @foreach($courses as $course)
                                <li>
                                    <a href="{{ route('courses.myCourse', $course->id) }}" class="text-blue-600 hover:underline">
                                        {{ $course->name }}
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
