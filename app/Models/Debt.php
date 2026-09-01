<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Debt extends Model
{
    protected $fillable = [
    'user_id',
    'name',
    'amount',
    'due_date',
    'note',
    'direction',
];
    public function user(): BelongsTo
{
    return $this->belongsTo(User::class);
}
}
