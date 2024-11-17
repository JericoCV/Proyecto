<x-guest-layout>
    <!-- Back Button -->
    <a href="{{ route('users.index') }}" class="text-blue-600 hover:text-blue-800 mb-6 block text-lg font-semibold">
        <i class="fas fa-arrow-left"></i> Volver
    </a>

    <!-- Form to update user details -->
    <form method="POST" action="{{ route('users.update', $user->id) }}" class="space-y-6">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nombres y Apellidos')" class="text-lg font-medium text-gray-700" />
            <x-text-input id="name" class="block mt-2 w-full p-3 rounded-lg border border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm font-small text-gray-700" type="text" name="name" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-600" />
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Correo')" class="text-lg font-medium text-gray-700" />
            <x-text-input id="email" class="block mt-2 w-full p-3 rounded-lg border border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm font-small text-gray-700" type="email" name="email" value="{{ old('email', $user->email) }}" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Contraseña')" class="text-lg font-medium text-gray-700" />
            <x-text-input id="password" class="block mt-2 w-full p-3 rounded-lg border border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm font-small text-gray-700" type="password" name="password" autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
            <p class="text-sm text-gray-600 mt-2">Dejar vacío si no deseas actualizar la contraseña</p>
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" class="text-lg font-medium text-gray-700" />
            <x-text-input id="password_confirmation" class="block mt-2 w-full p-3 rounded-lg border border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm font-small text-gray-700" type="password" name="password_confirmation" autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-600" />
        </div>

        <!-- Update Button -->
        <div class="flex justify-end mt-6">
            <x-primary-button class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300">
                {{ __('Actualizar Usuario') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
