<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Payment extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function failedPayment(): HasOne
    {
        return $this->HasOne(FailedPayment::class, 'payment_id', 'id');
    }

    public function successPayment(): HasOne
    {
        return $this->HasOne(SuccessfulPayment::class, 'payment_id', 'id');
    }

}
