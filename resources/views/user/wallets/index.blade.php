@extends('layouts.app')

@section('content')

<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="mb-1">Your Wallets</h4>
            <small class="text-muted">
                Manage your money accounts
            </small>
        </div>

        <a href="{{ route('user.wallets.create') }}"
           class="btn btn-primary">
            + Add Wallet
        </a>
    </div>


    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    @forelse($wallets as $wallet)

        <div class="card mb-3 shadow-sm">

            <div class="card-body">

                <div class="d-flex justify-content-between">

                    <div>

                        <h5 class="mb-1">
                            {{ $wallet->name }}
                        </h5>

                        <span class="badge bg-secondary">
                            {{ $wallet->walletType->name }}
                        </span>

                    </div>

                    <div class="text-end">

                        <div class="fw-bold">
                            Rp {{ number_format($wallet->initial_balance, 0, ',', '.') }}
                        </div>

                        <div class="mt-2">

                            <a href="{{ route('user.wallets.edit', $wallet) }}"
                               class="btn btn-sm btn-outline-primary">
                                Edit
                            </a>

                            <form action="{{ route('user.wallets.destroy', $wallet) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-sm btn-outline-danger"
                                        onclick="return confirm('Delete this wallet?')">
                                    Delete
                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    @empty

        <div class="text-center py-5">
            <p class="text-muted">
                You don't have any wallet yet.
            </p>

            <a href="{{ route('user.wallets.create') }}"
               class="btn btn-primary">
                Add Your First Wallet
            </a>
        </div>

    @endforelse

</div>

@endsection