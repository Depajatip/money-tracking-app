@extends('layouts.app')

@section('content')
<div class="container-fluid px-3 py-3 money-dashboard">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="d-flex align-items-center gap-3">
            <div class="dropdown">
                <div class="profile-placeholder dropdown-toggle p-0 border-0 overflow-hidden d-flex align-items-center justify-content-center"
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                    style="cursor: pointer; width: 40px; height: 40px; border-radius: 50%; background-color: #ddd;">

                    @if (Auth::user()->profile_photo)
                    <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}"
                        alt="Profile Photo"
                        class="w-100 h-100"
                        style="object-fit: cover; object-position: center; display: block;">
                    @else
                    <i class="bi bi-person-fill fs-5 text-secondary"></i>
                    @endif

                </div>

                <ul class="dropdown-menu dropdown-menu-end shadow">
                    <li>
                        <a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('profile.edit') }}">
                            <i class="bi bi-person"></i> Profile
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger d-flex align-items-center gap-2">
                                <i class="bi bi-box-arrow-right"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>

            <div>
                <div class="fw-semibold">Hello, {{ auth()->user()->name }}</div>
                <small class="text-muted">Let's check your money</small>
            </div>
        </div>

        <button class="btn btn-link text-dark p-0">
            <i class="bi bi-bell fs-5"></i>
        </button>
    </div>


    <div class="balance-card mb-3">
        <div class="small">Total Saldo</div>

        <div class="balance-amount">
            Rp {{ number_format($walletsList->sum('initial_balance'), 0, ',', '.') }}
            <i class="bi bi-eye ms-1"></i>
        </div>

    </div>


    <div class="row g-2 mb-2">

        <div class="col-6">
            <div class="summary-card">
                <div>
                    <i class="bi bi-arrow-up-circle-fill income-icon"></i>
                    Income
                </div>

                <strong class="income-text">
                    +Rp 50.000
                </strong>
            </div>
        </div>

        <div class="col-6">
            <div class="summary-card">
                <div>
                    <i class="bi bi-arrow-down-circle-fill expense-icon"></i>
                    Expense
                </div>

                <strong class="expense-text">
                    -Rp 15.000
                </strong>
            </div>
        </div>

    </div>


    <div class="trend-card mb-3">
        <div class="small fw-medium mb-2">
            Spending Trend
        </div>

        <div class="fake-chart">
            <svg viewBox="0 0 500 180" preserveAspectRatio="none">
                <polygon
                    points="
                    0,160
                    30,160
                    80,70
                    120,135
                    175,70
                    215,125
                    265,160
                    330,70
                    370,135
                    430,70
                    500,135
                    500,180
                    0,180" />
            </svg>
        </div>
    </div>


<div class="d-flex justify-content-between align-items-center mb-2">
    <span class="fw-medium">Your Wallet</span>
    <a href="{{ route('user.wallets.index') }}" class="text-decoration-none text-dark small">
        See all →
    </a>
</div>

<div class="wallet-list">
    @forelse($walletsList as $wallet)
        <div class="walletsList d-flex justify-content-between align-items-center mb-2">
            <div>
                <!-- Contoh pengkondisian ikon berdasarkan data (jika ada) -->
                @if(optional($wallet->walletType)->name == 'Bank')
                    <i class="bi bi-bank me-2"></i>
                @elseif(optional($wallet->walletType)->name == 'Credit Card')
                    <i class="bi bi-credit-card me-2"></i>
                @else
                    <i class="bi bi-wallet2 me-2"></i>
                @endif

                {{ $wallet->name }}
            </div>

            <span>Rp {{ number_format($wallet->initial_balance, 0, ',', '.') }}</span>
        </div>
    @empty
        <div class="text-center py-5">
            <p class="text-muted">
                You don't have any wallet yet.
            </p>
            <a href="{{ route('user.wallets.create') }}" class="btn btn-primary">
                Add Your First Wallet
            </a>
        </div>
    @endforelse
</div>

</div>

<style>
    .profile-placeholder.dropdown-toggle::after {
        display: none !important;
    }
</style>


@include('layouts.navbar')

@endsection