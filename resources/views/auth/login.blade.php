<x-guest-layout>

    <h2 class="text-xl font-semibold text-gray-800 mb-6 text-center">Iniciar Sesión</h2>

    <!-- Mensaje de estado (ej: "Te enviamos el link de recuperación") -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Correo electrónico -->
        <div>
            <x-input-label for="email" value="Correo electrónico" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                          :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Contraseña -->
        <div class="mt-4">
            <x-input-label for="password" value="Contraseña" />
            <x-text-input id="password" class="block mt-1 w-full" type="password"
                          name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Recordarme -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" name="remember"
                       class="rounded border-gray-300 text-red-600 shadow-sm focus:ring-red-500">
                <span class="ms-2 text-sm text-gray-600">Recordarme</span>
            </label>
        </div>

        <div class="flex items-center justify-between mt-6">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}"
                   class="text-sm text-gray-500 hover:text-gray-700 underline">
                    ¿Olvidaste tu contraseña?
                </a>
            @endif

            <button type="submit"
                    class="bg-red-600 text-white px-6 py-2 rounded shadow hover:bg-red-700 transition font-medium">
                Entrar
            </button>
        </div>

        <!-- Link al registro -->
        <div class="mt-4 text-center text-sm text-gray-600">
            ¿No tienes cuenta?
            <a href="{{ route('register') }}" class="text-red-600 hover:underline font-medium">
                Regístrate aquí
            </a>
        </div>

    </form>
</x-guest-layout>
