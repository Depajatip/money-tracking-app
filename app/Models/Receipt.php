<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Receipt extends Model
{
    protected $fillable = [
    'user_id',
    'image_path',
    'ocr_text',
];
    public function user(): BelongsTo
{
    return $this->belongsTo(User::class);
}

public function transaction(): BelongsTo
{
    return $this->belongsTo(Transaction::class);
}
}
