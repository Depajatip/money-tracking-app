<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Wallet;
use App\Models\WalletType;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function index()
    {
        $wallets = auth()->user()
            ->wallets()
            ->with('walletType')
            ->latest()
            ->get();

        return view('user.wallets.index', compact('wallets'));
    }

    public function create()
    {
        $walletTypes = WalletType::where('is_active', true)
            ->orderBy('name')
            ->get();

        return view('user.wallets.create', compact('walletTypes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'wallet_type_id' => ['required', 'exists:wallet_types,id'],
            'name' => ['required', 'string', 'max:100'],
            'initial_balance' => ['required', 'numeric', 'min:0'],
        ]);

        auth()->user()->wallets()->create($validated);

        return redirect()
            ->route('user.wallets.index')
            ->with('success', 'Wallet created successfully.');
    }

    public function edit(Wallet $wallet)
    {
        abort_unless($wallet->user_id === auth()->id(), 403);

        $walletTypes = WalletType::where('is_active', true)
            ->orderBy('name')
            ->get();

        return view(
            'user.wallets.edit',
            compact('wallet', 'walletTypes')
        );
    }

    public function update(Request $request, Wallet $wallet)
    {
        abort_unless($wallet->user_id === auth()->id(), 403);

        $validated = $request->validate([
            'wallet_type_id' => ['required', 'exists:wallet_types,id'],
            'name' => ['required', 'string', 'max:100'],
            'initial_balance' => ['required', 'numeric', 'min:0'],
        ]);

        $wallet->update($validated);

        return redirect()
            ->route('user.wallets.index')
            ->with('success', 'Wallet updated successfully.');
    }

    public function destroy(Wallet $wallet)
    {
        abort_unless($wallet->user_id === auth()->id(), 403);

        $wallet->delete();

        return redirect()
            ->route('user.wallets.index')
            ->with('success', 'Wallet deleted successfully.');
    }
}
