<x-guest-layout>

    <!-- FORM DIBUKA DI SINI (Membuat input foto masuk ke dalam form) -->
    <form method="POST" action="{{ route('completeprofile.store') }}" enctype="multipart/form-data">
        @csrf

        <div>
            <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center; padding-top: 50px;">
                
                <!-- Placeholder / Ilustrasi Atas -->
                <div style="width: 150px; height: 150px; border-radius: 50%; background: #ddd;" class="d-flex align-items-center justify-content-center mb-3">
                    <i class="bi bi-person-bounding-box fs-1 text-secondary"></i>
                </div>

                <p class="fs-1 fw-bold mb-4">Complete your profile</p>

                <!-- Input File profile (Sudah di dalam form) -->
                <input type="file" id="profileInput" name="profile_photo" accept="image/*" class="d-none" onchange="previewImage(event)">

                <!-- Label Tombol Upload -->
                <label for="profileInput" style="cursor: pointer;" class="d-flex flex-column align-items-center">
                    
                    <div id="profilePreviewContainer" 
                         style="width: 70px; height: 70px; border-radius: 50%; background: #ddd; overflow: hidden;" 
                         class="d-flex align-items-center justify-content-center border shadow-sm">
                        
                        <i id="defaultIcon" class="bi bi-camera-fill fs-4 text-secondary"></i>
                        <img id="profilePreview" src="" alt="Preview" class="w-100 h-100 d-none" style="object-fit: cover;">
                    
                    </div>

                    <p class="mt-2 text-primary fw-semibold small">Choose profile</p>
                </label>

                <x-input-error :messages="$errors->get('profile')" class="mt-2" />
            </div>
        </div>

        <!-- Input Text Profile -->
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

        <!-- Stepper Bar Component -->
        <div class="container" style="max-width: 500px; margin-top: 25px;">
            <p class="fw-bold mb-3 fs-6">Step 2/4 - Complete Profile</p>

            <div class="position-relative d-flex justify-content-between align-items-center">

                <div class="progress position-absolute top-50 start-0 translate-middle-y w-100" style="height: 8px; z-index: 0;">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 33%;" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100"></div>
                </div>

                <div class="step-circle bg-primary border border-primary d-flex align-items-center justify-content-center position-relative" style="z-index: 1;">
                    <i class="bi bi-check text-white" style="font-size: 12px; line-height: 1;"></i>
                </div>

                <div class="step-circle border border-primary bg-white d-flex align-items-center justify-content-center position-relative" style="z-index: 1;">
                    <div class="bg-primary rounded-circle" style="width: 10px; height: 10px;"></div>
                </div>

                <div class="step-circle border border-secondary bg-white position-relative" style="z-index: 1;"></div>

                <div class="step-circle border border-secondary bg-white position-relative" style="z-index: 1;"></div>

            </div>

            <style>
                .step-circle {
                    width: 18px;
                    height: 18px;
                    border-radius: 50%;
                    border-width: 2px !important;
                }
            </style>
        </div>

    </form> <!-- FORM DITUTUP DI SINI -->

    <script>
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('profilePreview');
            const defaultIcon = document.getElementById('defaultIcon');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('d-none');
                    defaultIcon.classList.add('d-none');
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</x-guest-layout>