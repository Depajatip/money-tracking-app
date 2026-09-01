@extends('layouts.app')

@section('content')

<div class="container py-4">

    <h4 class="mb-4">Add Wallet</h4>

    <form action="{{ route('user.wallets.store') }}"
          method="POST">

        @csrf

        <div class="mb-3">

            <label class="form-label">
                Wallet Type
            </label>

            <select name="wallet_type_id"
                    class="form-select"
                    required>

                <option value="">
                    Select wallet type
                </option>

                @foreach($walletTypes as $type)

                    <option value="{{ $type->id }}"
                        {{ old('wallet_type_id') == $type->id ? 'selected' : '' }}>

                        {{ $type->name }}

                    </option>

                @endforeach

            </select>

            @error('wallet_type_id')
                <div class="text-danger small">
                    {{ $message }}
                </div>
            @enderror

        </div>


        <div class="mb-3">

            <label class="form-label">
                Wallet Name
            </label>

            <input type="text"
                   name="name"
                   class="form-control"
                   placeholder="Example: BCA Main"
                   value="{{ old('name') }}"
                   required>

            @error('name')
                <div class="text-danger small">
                    {{ $message }}
                </div>
            @enderror

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
                   value="{{ old('initial_balance', 0) }}"
                   required>

            @error('initial_balance')
                <div class="text-danger small">
                    {{ $message }}
                </div>
            @enderror

        </div>


        <button class="btn btn-primary">
            Save Wallet
        </button>

        <a href="{{ route('user.wallets.index') }}"
           class="btn btn-secondary">
            Cancel
        </a>

    </form>

</div>

@endsection