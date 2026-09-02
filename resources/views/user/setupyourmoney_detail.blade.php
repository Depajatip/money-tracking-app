@extends('layouts.app')

@section('content')
<div class="container py-4" style="max-width: 450px;">
    
    <!-- Header Back Button & Title -->
    <div class="d-flex align-items-center mb-4">
        <a href="{{ route('setupYourMoney') }}" class="text-dark text-decoration-none me-3">
            <i class="bi bi-chevron-left fs-4"></i>
        </a>
        <h5 class="fw-bold m-0">Add {{ $walletType->name }}</h5>
    </div>

    <!-- Icon & Subtitle -->
    <div class="text-center my-4">
        @if(str_contains(strtolower($walletType->name), 'cash'))
            <i class="bi bi-cash-stack display-4 text-dark"></i>
        @elseif(str_contains(strtolower($walletType->name), 'bank'))
            <i class="bi bi-bank display-4 text-dark"></i>
        @else
            <i class="bi bi-credit-card-2-front display-4 text-dark"></i>
        @endif
        <h4 class="fw-bold mt-2 text-dark">{{ $walletType->name }}</h4>
    </div>

    <p class="fw-semibold text-dark fs-6 mb-4" style="line-height: 1.4;">
        Apa Nama Instansi {{ $walletType->name }} dan Berapa Jumlah Saldo yang mau Anda Masukan <span class="text-danger">*</span>
    </p>

    <form method="POST" action="{{ route('setupYourMoney.store') }}">
        @csrf
        
        <input type="hidden" name="wallet_type_id" value="{{ $walletType->id }}">

        <div class="mb-3">
            <label for="name" class="form-label fw-bold text-dark">Nama {{ $walletType->name }}</label>
            <input type="text" 
                   id="name" 
                   name="name" 
                   class="form-control rounded-3 py-2 px-3 border" 
                   placeholder="Masukan Nama {{ $walletType->name }}" 
                   value="{{ old('name', str_contains(strtolower($walletType->name), 'cash') ? 'Cash' : '') }}" 
                   required>
            <x-input-error :messages="$errors->get('name')" class="mt-1" />
        </div>

        <div class="mb-1">
            <label for="initial_balance" class="form-label fw-bold text-dark">Rp</label>
            <input type="number" 
                   id="initial_balance" 
                   name="initial_balance" 
                   class="form-control rounded-3 py-2 px-3 border" 
                   placeholder="Masukan Uang Awal" 
                   value="{{ old('initial_balance') }}" 
                   min="0" 
                   required>
            <x-input-error :messages="$errors->get('initial_balance')" class="mt-1" />
        </div>
        
        <small class="text-dark d-block mb-5">*Ini adalah saldo awal Anda.</small>

        <button type="submit" 
                class="btn text-white w-100 py-3 fw-bold rounded-4 shadow-sm" 
                style="background-color: #3A2A2A;">
            Continue
        </button>
    </form>
</div>
@endsection