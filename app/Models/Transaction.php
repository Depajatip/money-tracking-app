<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    protected $fillable = [
    'user_id',
    'category_id',
    'wallet_id',
    'from_wallet_id',
    'to_wallet_id',
    'receipt_id',
    'type',
    'amount',
    'transaction_date',
    'note',
];
    public function user(): BelongsTo
{
    return $this->belongsTo(User::class);
}

public function category(): BelongsTo
{
    return $this->belongsTo(Category::class);
}

public function wallet(): BelongsTo
{
    return $this->belongsTo(Wallet::class);
}

public function fromWallet(): BelongsTo
{
    return $this->belongsTo(Wallet::class, 'from_wallet_id');
}

public function toWallet(): BelongsTo
{
    return $this->belongsTo(Wallet::class, 'to_wallet_id');
}

public function receipt(): BelongsTo
{
    return $this->belongsTo(Receipt::class);
}
}
