<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SuccessfulPayment extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function refunds(): HasMany
    {
        return $this->HasMany(Refund::class, 'successful_payment_id', 'id');
    }

    public function payment(): HasOne
    {
        return $this->HasOne(Payment::class, 'payment_id', 'id');
    }
}
