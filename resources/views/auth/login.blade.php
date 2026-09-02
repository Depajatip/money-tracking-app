<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

<div>
    <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center; padding-top: 50px;">
        <div style="width: 150px; height: 150px; border-radius: 50%; background: #ddd;"></div>
        <p class="fs-1 fw-bold mb-0">Welcome Back!!</p>
        <p class="mt-0">Manage your money with ease</p>
        <p class="fs-2 fw-bold mt-3">Login</p>
    </div>
</div>


    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div style="margin:auto; width: 90%; padding-top: 20px;">
            <!-- Email Address -->
            <div class="mb-3">
                <x-input-label for="email" :value="__('Email')" class="form-label fw-bold fs-6" />
                <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" placeholder="Masukkan email anda" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="text-danger small mt-1" />
            </div>

            <!-- Password -->
            <div class="mb-0">
                <x-input-label for="password" :value="__('Password')" class="form-label fw-bold fs-6" />

                <x-text-input id="password" class="form-control"
                    type="password"
                    name="password"
                    placeholder="Masukkan password anda"
                    required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="text-danger small mt-1" />
            </div>

            <div class="mt-0" style="display: flex; justify-content: end;">
                @if (Route::has('password.request'))
                <a class="text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot password?') }}
                </a>
                @endif
            </div>
        </div>
        <div>
            <button class="btn mt-4" style="width: 80%; margin:auto; display: block; background-color: #3A2A2A; color: white;">
                {{ __('Log in') }}
            </button>
            <p class="text-center">Don't have an account? <a href="{{ route('register') }}">Sign up</a></p>
        </div>
        
    </form>
</x-guest-layout>