<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PaymentGateway extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function failedRefunds(): HasMany
    {
        return $this->HasMany(PaymentGatewayRule::class, 'payment_gateway_id', 'id');
    }
}
