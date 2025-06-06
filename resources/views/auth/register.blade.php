<x-guest-layout>
    <!-- Background with animated gradient -->
    <div class="fixed inset-0 bg-black">
        <div class="absolute inset-0 bg-gradient-to-br from-indigo-900/20 via-black to-purple-900/20"></div>
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,_var(--tw-gradient-stops))] from-indigo-900/20 via-black to-black"></div>
    </div>

    <div class="relative min-h-screen flex flex-col sm:justify-center items-center">
        <div class="relative">
            <a href="/" class="flex items-center justify-center mb-8">
                <h1 class="text-2xl font-bold bg-gradient-to-r from-indigo-400 to-purple-400 bg-clip-text text-transparent">
                    Produktivitas App
                </h1>
            </a>
        </div>

        <div class="w-full sm:max-w-md px-6 py-8 bg-black/60 shadow-[0_0_40px_rgba(79,70,229,0.15)] backdrop-blur-xl border border-gray-800 overflow-hidden rounded-2xl">
            <h2 class="text-2xl font-bold text-white mb-6 text-center">Register</h2>

            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" class="text-gray-300" />
                    <x-text-input id="name" class="block mt-2 w-full bg-gray-900/50 border-gray-700 text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" class="text-gray-300" />
                    <x-text-input id="email" class="block mt-2 w-full bg-gray-900/50 border-gray-700 text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" class="text-gray-300" />
                    <x-text-input id="password" class="block mt-2 w-full bg-gray-900/50 border-gray-700 text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-gray-300" />
                    <x-text-input id="password_confirmation" class="block mt-2 w-full bg-gray-900/50 border-gray-700 text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div>
                    <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-semibold text-white bg-gradient-to-r from-indigo-500 to-purple-600 hover:from-indigo-600 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 focus:ring-offset-gray-900 transition-all duration-300 hover:scale-[1.02]">
                        {{ __('Register') }}
                    </button>
                </div>

                <div class="text-center mt-6">
                    <p class="text-sm text-gray-400">
                        {{ __('Already registered?') }}
                        <a href="{{ route('login') }}" class="font-semibold text-indigo-400 hover:text-indigo-300 transition-colors duration-200">
                            {{ __('Log in') }}
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
