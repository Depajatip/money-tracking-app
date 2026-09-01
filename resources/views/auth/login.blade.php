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
    <div class="container" style="max-width: 500px; margin-top: 35%;">
    <!-- Judul Step Dinamis -->
    <!-- Contoh Logika: Sesuaikan teks berdasarkan variabel $currentStep dari backend -->
    <p class="fw-bold mb-3 fs-6">Step 1/4 - Create Account</p>

    <!-- Komponen Stepper -->
    <div class="position-relative d-flex justify-content-between align-items-center">
        
        <!-- Garis Progress Abu-abu (Latar Belakang) -->
        <div class="progress position-absolute top-50 start-0 translate-middle-y w-100" style="height: 8px; z-index: 0;">
            <!-- Mengatur panjang warna biru aktif berdasarkan step saat ini -->
            <!-- Step 1 = w-0, Step 2 = w-33, Step 3 = w-66, Step 4 = w-100 -->
            <div class="progress-bar bg-primary w-0" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
        </div>

        <!-- Lingkaran Step 1 (Aktif/Selesai) -->
        <!-- Gunakan kelas 'border-primary' dan sub-lingkaran biru di dalamnya -->
        <div class="step-circle border border-primary bg-white d-flex align-items-center justify-content-center position-relative" style="z-index: 1;">
            <div class="bg-primary rounded-circle" style="width: 10px; height: 10px;"></div>
        </div>

        <!-- Lingkaran Step 2 (Belum Aktif) -->
        <!-- Untuk step berikutnya, cukup gunakan border abu-abu biasa -->
        <div class="step-circle border border-secondary bg-white position-relative" style="z-index: 1;"></div>

        <!-- Lingkaran Step 3 (Belum Aktif) -->
        <div class="step-circle border border-secondary bg-white position-relative" style="z-index: 1;"></div>

        <!-- Lingkaran Step 4 (Belum Aktif) -->
        <div class="step-circle border border-secondary bg-white position-relative" style="z-index: 1;"></div>

</div>

<!-- CSS Kustom Tambahan (Taruh di dalam tag <style> atau file CSS Anda) -->
<style>
    .step-circle {
        width: 18px;
        height: 18px;
        border-radius: 50%;
        border-width: 2px !important;
    }
</style>
</x-guest-layout>