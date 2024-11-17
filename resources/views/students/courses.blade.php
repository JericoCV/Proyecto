<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Mis Cursos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="p-6 text-gray-900">
                    <h3 class="text-2xl font-bold mb-6">Cursos Inscritos</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @forelse ($courses as $course)
                            <div class="bg-blue-50 border border-blue-300 rounded-lg shadow-md p-4">
                                <h4 class="text-lg font-semibold text-blue-700">{{ $course->name }}</h4>
                        
                                <div class="mt-4">
                                    <a href="{{ route('student.activities', $course->id) }}" 
                                       class="inline-block bg-blue-600 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-700">
                                        Ver Actividades
                                    </a>
                                </div>
                            </div>
                        @empty
                            <p class="col-span-full text-center text-gray-500">No estás inscrito en ningún curso actualmente.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
