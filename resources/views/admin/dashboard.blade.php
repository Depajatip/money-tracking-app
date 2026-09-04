@extends('layouts.app')

@section('content')

<div class="container py-4">

    <div class="mb-4">
        <h1 class="fw-bold">Admin Dashboard</h1>
        <p class="text-muted">
            Manage the Money Tracking system.
        </p>
    </div>
<button>    <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger d-flex align-items-center gap-2">
                                <i class="bi bi-box-arrow-right"></i> Logout
                            </button>
                        </form></button>


    <div class="row g-4">

        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6 class="text-muted">Total Users</h6>
                    <h2 class="fw-bold">0</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6 class="text-muted">Wallet Types</h6>
                    <h2 class="fw-bold">3</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h6 class="text-muted">Categories</h6>
                    <h2 class="fw-bold">0</h2>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection