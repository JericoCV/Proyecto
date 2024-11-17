<x-guest-layout>
    <form method="POST" action="{{ route('users.store') }}" class="space-y-6">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nombres y Apellidos')" class="text-lg font-medium text-gray-700" />
            <x-text-input id="name" class="block mt-2 w-full p-3 rounded-lg border border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm font-medium text-gray-700" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-600" />
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Correo Electrónico')" class="text-lg font-medium text-gray-700" />
            <x-text-input id="email" class="block mt-2 w-full p-3 rounded-lg border border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm font-medium text-gray-700" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Contraseña')" class="text-lg font-medium text-gray-700" />
            <x-text-input id="password" class="block mt-2 w-full p-3 rounded-lg border border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm font-medium text-gray-700" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" class="text-lg font-medium text-gray-700" />
            <x-text-input id="password_confirmation" class="block mt-2 w-full p-3 rounded-lg border border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm font-medium text-gray-700" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-600" />
        </div>

        <!-- Role Selector -->
        <div>
            <x-input-label for="role" :value="__('Rol')" class="text-lg font-medium text-gray-700" />
            <select name="role_id" class="block mt-2 w-full p-3 rounded-lg border border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm font-medium text-gray-700" required>
                <option value="2">Docente</option>
                <option value="3">Estudiante</option>
            </select>
            <x-input-error :messages="$errors->get('role_id')" class="mt-2 text-red-600" />
        </div>

        <!-- Form Buttons -->
        <div class="flex items-center justify-between mt-6">
            
            <x-primary-button class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300">
                {{ __('Registrar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
