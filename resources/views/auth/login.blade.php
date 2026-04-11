
<x-guest-layout>

    <div class="w-full max-w-md mx-auto bg-white dark:bg-gray-800 p-6 rounded-2xl">

        <!-- Logo + Title -->
        <div class="text-center mb-6">

            <h2 class="text-xl font-bold text-gray-800 dark:text-white">
                {{ setting('farm_name') ?? 'Poultry Farm System' }}
            </h2>

            <p class="text-sm text-gray-500 dark:text-gray-400">
                Login to your dashboard
            </p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Form -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email"
                    class="block mt-1 w-full rounded-lg"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password"
                    class="block mt-1 w-full rounded-lg"
                    type="password"
                    name="password"
                    required />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember + Forgot -->
            <div class="flex items-center justify-between mt-4 text-sm">
                <label class="flex items-center gap-2">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 dark:bg-gray-900"
                        name="remember">
                    <span class="text-gray-600 dark:text-gray-400">
                        Remember me
                    </span>
                </label>

                @if (Route::has('password.request'))
                    <a class="text-yellow-600 hover:underline"
                       href="{{ route('password.request') }}">
                        Forgot?
                    </a>
                @endif
            </div>

            <!-- Button -->
            <div class="mt-6">
                <x-primary-button class="w-full justify-center bg-yellow-600 hover:bg-yellow-700">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>

    </div>

</x-guest-layout>
