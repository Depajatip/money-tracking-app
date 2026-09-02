@extends('layouts.app')

@section('content')
<div class="container py-4" style="max-width: 450px;">
    
    <div class="text-center mb-4">
        <div class="mb-2">
            <span class="fs-1">logo</span>
        </div>
        <div class="mb-1">
            <i class="bi bi-check2 fs-3 text-dark"></i>
        </div>
        <h4 class="fw-bold text-dark mb-2">You're all set!</h4>
        <p class="text-muted small mb-0">Your account is ready.</p>
        <p class="text-muted small">Let's start tracking your money.</p>
    </div>

    <hr class="my-4 text-muted opacity-25">

    <h6 class="fw-bold text-dark text-center mb-4">Welcome to Money Tracking App!!</h6>

    <div class="d-flex align-items-center gap-3 mb-4 px-2">
        <div class="rounded-circle border border-dark d-flex align-items-center justify-content-center flex-shrink-0" 
             style="width: 60px; height: 60px;">
            <i class="bi bi-person fs-2 text-dark"></i>
        </div>

        <div>
            <h6 class="fw-bold text-dark m-0">{{ $user->name ?? auth()->user()->name ?? 'User' }}</h6>
            <div class="text-muted small">{{ $user->email ?? auth()->user()->email ?? '-' }}</div>
            <div class="text-muted small">{{ $user->phone_number ?? auth()->user()->phone_number ?? '-' }}</div>
            <div class="text-muted small">
                @if(isset($user->birth_date) || isset(auth()->user()->birth_date))
                    {{ \Carbon\Carbon::parse($user->birth_date ?? auth()->user()->birth_date)->format('d/m/Y') }}
                @else
                    -
                @endif
            </div>
        </div>
    </div>

<h6 class="fw-bold text-dark mb-3">Your Wallet</h6>

<div class="d-flex flex-column gap-2 mb-3">
    @forelse($addedWallets ?? [] as $item)
        <div class="card border-0 shadow-sm rounded-4 p-3 d-flex flex-row align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-3">
                @php 
                    $typeName = strtolower($item->walletType->name ?? $item->type_name ?? ''); 
                @endphp

                @if(str_contains($typeName, 'cash'))
                    <i class="bi bi-cash-stack fs-4 text-dark"></i>
                @elseif(str_contains($typeName, 'bank'))
                    <i class="bi bi-bank fs-4 text-dark"></i>
                @else
                    <i class="bi bi-credit-card-2-front fs-4 text-dark"></i>
                @endif

                <span class="fw-bold text-dark fs-6">{{ $item->name }}</span>
            </div>
            <span class="fw-bold text-dark fs-6">
                Rp {{ number_format($item->initial_balance, 0, ',', '.') }}
            </span>
        </div>
    @empty
        <div class="text-center p-3 border rounded-3 bg-light">
            <p class="text-muted small mb-0">Belum ada wallet tersimpan.</p>
        </div>
    @endforelse
</div>

    <hr class="my-3 text-muted opacity-25">

    <div class="d-flex align-items-center justify-content-between mb-4 px-1">
        <span class="fw-bold text-dark fs-6">Total :</span>
        <span class="fw-bold text-dark fs-5">
            Rp {{ number_format($totalBalance ?? 0, 0, ',', '.') }}
        </span>
    </div>

    <form method="POST" action="{{ route('allSet.save') }}">
        @csrf
        <button type="submit" 
                class="btn text-white w-100 py-3 fw-bold rounded-4 shadow-sm" 
                style="background: linear-gradient(180deg, #103ba8 0%, #36364a 100%);">
            Go to Dashboard
        </button>
    </form>

</div>
@endsection