<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Refund extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function failedRefund(): HasOne
    {
        return $this->HasOne(FailedRefund::class, 'refund_id', 'id');
    }

    public function successfulRefund(): BelongsTo
    {
        return $this->belongsTo(SuccessfulRefund::class, 'refund_id', 'id');
    }
}
