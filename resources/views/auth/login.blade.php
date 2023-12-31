<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img src="{{ asset('uploads/logo.png') }}" alt="" class="fill-current text-gray-500" style="width: 250px; height: 200px">
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address/ Mobile Number -->
            <div>
                <x-label for="login" :value="__('Email/Mobile Number')" />

                <x-input id="login" class="block mt-1 w-full" type="text" name="login" :value="old('login')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <p class="text-sm text-gray-600">Don't has Account? </p>
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                        {{ __('Register') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>

            <div class="mt-4 flex w-full justify-center items-center rounded-md bg-gray-100 hover:bg-gray-50">
                <img src="{{ asset('uploads/google-icon.svg') }}" alt="" style="width: 50px">

                <a href="{{ route('google.login') }}" class="ml-2 text-gray-700 font-semibold">
                    {{ __('Login with Google') }}
                </a>
            </div>

            <div class="mt-4 flex w-full justify-center items-center rounded-md bg-gray-100 hover:bg-gray-50">
                <img src="{{ asset('uploads/Facebook-logo.png') }}" alt="" style="width: 50px">

                <a href="{{ route('facebook.login') }}" class="ml-2 text-gray-700 font-semibold">
                    {{ __('Login with Facebook') }}
                </a>
            </div>

            <div class="mt-4 flex w-full justify-center items-center rounded-md bg-gray-100 hover:bg-gray-50">
                <img src="{{ asset('uploads/GitHub-Mark.png') }}" alt="" style="width: 50px">

                <a href="{{ route('github.login') }}" class="ml-2 text-gray-700 font-semibold">
                    {{ __('Login with Github') }}
                </a>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
