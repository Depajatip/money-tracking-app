<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\WalletType;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class MoneySetupController extends Controller
{
    public function setupYourMoney()
    {
        $walletTypes = WalletType::where('is_active', true)->get();
        $user = Auth::user();

        $addedWallets = $user
            ? Wallet::with('walletType')->where('user_id', $user->id)->get()
            : collect();
        $totalBalance = $addedWallets->sum('initial_balance');

        return view('user.setupyourmoney', compact('user', 'walletTypes', 'addedWallets', 'totalBalance'));
    }

    public function showMoneyForm(WalletType $walletType)
    {
        $user = Auth::user();
        return view('user.setupyourmoney_detail', compact('user', 'walletType'));
    }

    public function storeMoneySetup(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'wallet_type_id' => ['required', 'exists:wallet_types,id'],
            'name'           => ['required', 'string', 'max:100'],
            'initial_balance'=> ['required', 'numeric', 'min:0'],
        ]);

        $user = Auth::user();

        $user->wallets()->create([
            'wallet_type_id'  => $validated['wallet_type_id'],
            'name'            => $validated['name'],
            'initial_balance' => $validated['initial_balance'],
        ]);

        return redirect()->route('setupYourMoney');
    }

    public function allSet()
{
    $user = Auth::user();

    if (!$user) {
        return redirect()->route('login');
    }

    $addedWallets = \App\Models\Wallet::with('walletType')
        ->where('user_id', $user->id)
        ->get();

    $totalBalance = $addedWallets->sum('initial_balance');

    return view('user.allset', compact('user', 'addedWallets', 'totalBalance'));
}

    public function saveSetup(): RedirectResponse
    {
        return redirect()->route('dashboard')->with('success', 'Setup berhasil!');
    }
}