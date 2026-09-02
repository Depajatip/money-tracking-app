@extends('layouts.app')

@section('content')
<div class="container-fluid px-3 py-3 money-dashboard">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="d-flex align-items-center gap-3">
            <div class="dropdown">
                <!-- Pemicu Dropdown ditempelkan ke profile-placeholder -->
                <div class="profile-placeholder dropdown-toggle"
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                    style="cursor: pointer;">
                </div>

                <!-- Isi Menu Dropdown -->
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


    {{-- Total Balance --}}
    <div class="balance-card mb-3">
        <div class="small">Total Saldo</div>

        <div class="balance-amount">
            Rp 6.000.000
            <i class="bi bi-eye ms-1"></i>
        </div>

        <small>Starting Balance</small>
    </div>


    {{-- Income & Expense --}}
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


    {{-- Spending Trend --}}
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


    {{-- Wallet --}}
    <div class="d-flex justify-content-between align-items-center mb-2">
        <span class="fw-medium">Your Wallet</span>

        <a href="#"
            class="text-decoration-none text-dark small">
            See all →
        </a>
    </div>


    {{-- Wallet Items --}}
    <div class="wallet-list">

        <div class="wallet-item">
            <div>
                <i class="bi bi-wallet2 me-2"></i>
                aaa
            </div>

            <span>aaa</span>
        </div>

        <div class="wallet-item">
            <div>
                <i class="bi bi-bank me-2"></i>
                BCA
            </div>

            <span>Rp 2.000.000</span>
        </div>

        <div class="wallet-item">
            <div>
                <i class="bi bi-credit-card me-2"></i>
                Gopay
            </div>

            <span>Rp 3.000.000</span>
        </div>

    </div>

</div>


{{-- Bottom Navigation --}}
@include('layouts.navbar')

@endsection