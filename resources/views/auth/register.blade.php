<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Usuario (se autocompletara el email institucional)')" />
            <x-text-input 
                id="email" 
                class="block mt-1 w-full" 
                type="text" 
                name="email_input" 
                :value="old('email') ? str_replace('@academy.com', '', old('email')) : ''" 
                required 
                autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <div class="mt-4">
            <label for="role" class="form-label">Role</label>
            <select name="role_id" class="block mt-1 w-full" required>
                <option value="1">Administrador</option>
                <option value="2">Docente</option>
                <option value="3">Estudiante</option>
            </select>
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
            
    <script>
        document.querySelector('form').addEventListener('submit', function (e) {
            const emailField = document.getElementById('email');
            const domain = "@academy.com";
    
            // Añadir el dominio antes de enviar el formulario
            if (!emailField.value.includes(domain)) {
                emailField.name = 'email'; // Cambia el nombre del campo para enviar el valor correcto
                emailField.value = emailField.value.trim() + domain;
            }
        });
    </script>
</x-guest-layout>
