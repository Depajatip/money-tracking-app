<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Wallet extends Model
{

protected $fillable = [
    'user_id',
    'wallet_type_id',
    'name',
    'initial_balance',
];

    protected $casts = [
        'initial_balance' => 'decimal:2',
    ];
    public function user(): BelongsTo
{
    return $this->belongsTo(User::class);
}

public function walletType(): BelongsTo
{
    return $this->belongsTo(WalletType::class);
}

public function transactions(): HasMany
{
    return $this->hasMany(Transaction::class);
}

public function outgoingTransfers(): HasMany
{
    return $this->hasMany(Transaction::class, 'from_wallet_id');
}

public function incomingTransfers(): HasMany
{
    return $this->hasMany(Transaction::class, 'to_wallet_id');
}
}
