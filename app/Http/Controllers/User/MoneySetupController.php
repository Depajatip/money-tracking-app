<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Wallet;
use App\Models\WalletType;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MoneySetupController extends Controller
{
    public function setupYourMoney(): View
    {
        return view('user.setupyourmoney');
    }
}
