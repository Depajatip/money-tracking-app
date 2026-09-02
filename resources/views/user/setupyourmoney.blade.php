<x-guest-layout>

    <div>
        <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center; padding-top: 50px;">
            <div style="width: 120px; height: 120px; border-radius: 50%; background: #ddd;"></div>
            <p class="fs-4 fw-bold mb-4">Setup your money</p>
        </div>
    </div>

    <form method="POST" action="{{ route('completeprofile.store') }}">
        @csrf
        <div class="container py-4" style="max-width: 480px;">

            <!-- Section 1: Where do you keep your money? -->
            <p class="fw-semibold text-dark mb-3">Where do you keep your money?</p>

            <div class="row g-3 mb-4">
                @foreach($walletTypes as $type)
                <div class="{{ strtolower($type->name) === 'e-wallet' || strtolower($type->name) === 'e - wallet' ? 'col-12' : 'col-6' }}">
                    <a href="{{ route('setupYourMoney.form', $type->id) }}" class="text-decoration-none">
                        <div class="card wallet-card p-3 shadow-sm border-0 position-relative">
                            <div class="wallet-border-left"></div>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center gap-2">
                                    @if(str_contains(strtolower($type->name), 'cash'))
                                    <i class="bi bi-cash-stack fs-4 text-dark"></i>
                                    @elseif(str_contains(strtolower($type->name), 'bank'))
                                    <i class="bi bi-bank fs-4 text-dark"></i>
                                    @else
                                    <i class="bi bi-credit-card-2-front fs-4 text-dark"></i>
                                    @endif
                                    <span class="fw-bold fs-6 text-dark">{{ $type->name }}</span>
                                </div>
                                <i class="bi bi-chevron-right text-muted"></i>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>

            <hr class="my-4 text-muted opacity-25">

            <!-- Section 2: Your Wallet List (Akan tampil jika sudah ada wallet) -->
            @if(count($addedWallets) > 0)
            <h6 class="fw-bold text-dark mb-3">Your Wallet</h6>

            <div class="d-flex flex-column gap-2 mb-4">
                @foreach($addedWallets as $index => $item)
                <div class="card border-0 shadow-sm rounded-4 p-3 d-flex flex-row align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-3">
                        @if(str_contains(strtolower($item['type_name']), 'cash'))
                        <i class="bi bi-cash-stack fs-4 text-dark"></i>
                        @elseif(str_contains(strtolower($item['type_name']), 'bank'))
                        <i class="bi bi-bank fs-4 text-dark"></i>
                        @else
                        <i class="bi bi-credit-card-2-front fs-4 text-dark"></i>
                        @endif
                        <span class="fw-bold text-dark fs-6">{{ $item['name'] }}</span>
                    </div>
                    <span class="fw-bold text-dark fs-6">
                        Rp {{ number_format($item['initial_balance'], 0, ',', '.') }}
                    </span>
                </div>
                @endforeach
            </div>

            <hr class="my-3 text-muted opacity-25">

            <!-- Total Balance -->
            <div class="d-flex align-items-center justify-content-between mb-4 px-1">
                <span class="fw-bold text-dark fs-6">Total :</span>
                <span class="fw-bold text-dark fs-5">
                    Rp {{ number_format($totalBalance, 0, ',', '.') }}
                </span>
            </div>

            <!-- Tombol Lanjut ke All Set -->
            <a href="{{ route('allSetProfile') }}"
                class="btn text-white w-100 py-3 fw-bold rounded-4 shadow-sm"
                style="background-color: #1a237e;">
                Continue
            </a>
            @endif

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

                /* Style Kartu Dasar */
                .wallet-card {
                    cursor: pointer;
                    border-radius: 10px !important;
                    overflow: hidden;
                    background-color: #ffffff;
                    transition: all 0.2s ease-in-out;
                }

                /* Garis Biru Tebal di Kiri */
                .wallet-border-left {
                    position: absolute;
                    left: 0;
                    top: 0;
                    bottom: 0;
                    width: 6px;
                    background-color: #0d6efd;
                    /* Warna biru */
                }

                /* Efek Hover */
                .wallet-card:hover {
                    transform: translateY(-2px);
                    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1) !important;
                }

                /* Efek Saat Kartu Dipilih (Checked State) */
                .btn-check:checked+.wallet-card {
                    background-color: #f0f7ff;
                    border: 1px solid #0d6efd !important;
                }

                .btn-check:checked+.wallet-card .wallet-border-left {
                    background-color: #0040a8;
                    /* Warna biru lebih gelap saat aktif */
                }
            </style>
    </form>
</x-guest-layout>