<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function completeProfileView(): View
    {
        return view('auth.completeprofile');
    }

public function allSetProfileView()
{
    $user = auth()->user();
    
    // Ambil data wallet milik user agar view tidak error
    $addedWallets = \App\Models\Wallet::with('walletType')
        ->where('user_id', $user->id)
        ->get();
        
    $totalBalance = $addedWallets->sum('initial_balance');

    return view('user.allsetprofile', compact('user', 'addedWallets', 'totalBalance'));
}

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'phone_number' => ['required', 'string', 'max:255'],
            'birth_date' => ['required', 'date'],
            // 'profile_photo' => ['required',],
        ]);
    
        $user = auth()->user();
        $user->update([
            'phone_number' => $request->phone_number,
            'birth_date' => $request->birth_date,
            // 'profile_photo' => $request->profile_photo,
        ]);
        // session(['setup_profile_data' => $validated]);

        return redirect()->route('setupYourMoney');
    }
}
