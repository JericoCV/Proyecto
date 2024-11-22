<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

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
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
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
