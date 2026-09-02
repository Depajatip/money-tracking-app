<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\WalletController;
use App\Http\Controllers\User\MoneySetupController;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['web', 'auth'])->group(function () {

    // Logika pengarah otomatis berdasarkan Role
    Route::get('/dashboard', function () {
        if (auth()->user()->role === 'ADMIN') {
            return redirect()->route('admin.dashboard');
        }
        
        return view('dashboard');
    })->name('dashboard');

    Route::resource('wallets',WalletController::class)->names('user.wallets');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/complete-profile', [ProfileController::class, 'completeProfileView'])->name('completeprofile');
    Route::post('/complete-profile-store', [ProfileController::class, 'store'])->name('completeprofile.store');
    Route::get('/all-set-profile', [ProfileController::class, 'allSetProfileView'])->name('allSetProfile');

    Route::get('/setup-your-money', [MoneySetupController::class, 'setupYourMoney'])->name('setupYourMoney');
    Route::get('/setup-your-money/{walletType}', [MoneySetupController::class, 'showMoneyForm'])->name('setupYourMoney.form');
    Route::post('/setup-your-money-store', [MoneySetupController::class, 'storeMoneySetup'])->name('setupYourMoney.store');

    Route::get('/all-set', [MoneySetupController::class, 'allSet'])->name('allSet');
    Route::post('/all-set/save', [MoneySetupController::class, 'saveSetup'])->name('allSet.save');



    // Admin Routes
    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');
    });

});

require __DIR__ . '/auth.php';
