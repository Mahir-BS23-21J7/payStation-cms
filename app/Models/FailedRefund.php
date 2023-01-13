<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;


class FailedRefund extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function refund(): BelongsTo
    {
        return $this->belongsTo(Refund::class, 'refund_id', 'id');
    }
}
