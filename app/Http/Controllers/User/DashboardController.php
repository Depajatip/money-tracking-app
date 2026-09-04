<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $walletsList = auth()->user()
            ->wallets()
            ->with('walletType')
            ->latest()
            ->get();

        return view('dashboard', compact('walletsList'));
    }

    /**
     * Display the specified resource.
     */
    public function yourWalletList()
    {
        $walletsList = auth()->user()
            ->wallets()
            ->with('walletType')
            ->latest()
            ->get();

        return view('dashboard', compact('walletsList'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
