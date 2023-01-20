<?php

namespace App\Repositories;

use App\Models\Payment;

class PaymentRepository
{
    public function all($userPrefix)
    {
        if(is_null($userPrefix)) {
            return Payment::paginate(50);
        }

        return Payment::query()->where('sys_trx_no', 'like', "{$userPrefix}%")->paginate(50);
    }
}
