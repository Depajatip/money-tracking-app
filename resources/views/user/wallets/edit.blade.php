@extends('layouts.app')

@section('content')

<div class="container py-4">

    <h4 class="mb-4">Edit Wallet</h4>

    <form action="{{ route('user.wallets.update', $wallet) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label class="form-label">
                Wallet Type
            </label>

            <select name="wallet_type_id"
                    class="form-select"
                    required>

                @foreach($walletTypes as $type)

                    <option value="{{ $type->id }}"
                        {{ $wallet->wallet_type_id == $type->id ? 'selected' : '' }}>

                        {{ $type->name }}

                    </option>

                @endforeach

            </select>

        </div>


        <div class="mb-3">

            <label class="form-label">
                Wallet Name
            </label>

            <input type="text"
                   name="name"
                   class="form-control"
                   value="{{ old('name', $wallet->name) }}"
                   required>

        </div>


        <div class="mb-4">

            <label class="form-label">
                Initial Balance
            </label>

            <input type="number"
                   name="initial_balance"
                   class="form-control"
                   min="0"
                   step="0.01"
                   value="{{ old('initial_balance', $wallet->initial_balance) }}"
                   required>

        </div>


        <button class="btn btn-primary">
            Update Wallet
        </button>

        <a href="{{ route('user.wallets.index') }}"
           class="btn btn-secondary">
            Cancel
        </a>

    </form>

</div>

@endsection