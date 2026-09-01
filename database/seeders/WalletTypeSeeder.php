<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\WalletType;

class WalletTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
public function run(): void
{
    WalletType::create([
        'name' => 'Cash',
        'description' => 'Physical cash',
    ]);

    WalletType::create([
        'name' => 'Bank',
        'description' => 'Bank account',
    ]);

    WalletType::create([
        'name' => 'E-Wallet',
        'description' => 'Electronic wallet',
    ]);
}
}
