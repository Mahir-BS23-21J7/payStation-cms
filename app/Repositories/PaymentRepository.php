<?php

namespace App\Repositories;

use App\Models\Payment;

class PaymentRepository
{
    public function all($userId)
    {
        if(is_null($userId)) {
            return Payment::paginate(50);
        }

        return Payment::query()->where('user_id', $userId)->paginate(50);
    }
}
