<x-guest-layout>

    <div>
        <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center; padding-top: 50px;">
            <div style="width: 150px; height: 150px; border-radius: 50%; background: #ddd;"></div>
            <p class="fs-1 fw-bold mb-4">Complete your profile</p>
            <div style="width: 70px; height: 70px; border-radius: 50%; background: #ddd;"></div>
            <p class="mt-0">choose profile</p>
        </div>
    </div>

    <form method="POST" action="{{ route('completeprofile.store') }}">
        @csrf
        <div style="margin:auto; width: 90%;">

            <div class="mb-3">
                <x-input-label for="name" :value="__('Name')" class="form-label fw-bold fs-6" />
                <x-text-input style="background-color: #e9ecef; cursor: not-allowed;"
                    id="name"
                    class="form-control"
                    type="text"
                    name="name"
                    :value="old('name', auth()->user()->name)"
                    placeholder="Masukkan nama anda"
                    required
                    autofocus
                    autocomplete="name"
                    readonly />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mb-3">
                <x-input-label for="email" :value="__('Email')" class="form-label fw-bold fs-6" />
                <x-text-input style="background-color: #e9ecef; cursor: not-allowed;" 
                    id="email"
                    class="form-control"
                    type="email"
                    name="email"
                    :value="old('email', auth()->user()->email)"
                    placeholder="Masukkan email anda"
                    required
                    autocomplete="username"
                    readonly />
                    
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="phone_number" :value="__('Nomor Telepon')" class="form-label fw-bold fs-6" />

                <x-text-input id="phone_number" class="form-control"
                    type="number"
                    name="phone_number"
                    placeholder="Masukkan nomor telp anda"
                    required autocomplete="new-s" />

                <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="birth_date" :value="__('Tanggal Lahir')" class="form-label fw-bold fs-6" />

                <x-text-input id="birth_date" class="form-control"
                    type="date"
                    name="birth_date"
                    placeholder="Masukkan tanggal lahir anda"
                    required autocomplete="birth_date" />

                <x-input-error :messages="$errors->get('birth_date')" class="mt-2" />
            </div>
        </div>
        <div>
            <button type="submit" class="btn mt-4" style="width: 80%; margin:auto; display: block; background-color: #3A2A2A; color: white;">
                continue
            </button>
        </div>


        <div class="container" style="max-width: 500px; margin-top: 25px;">
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
    </form>
</x-guest-layout>