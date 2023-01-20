<?php

namespace App\Repositories;

use App\Models\FailedPayment;

class FailedPaymentRepository
{
    public function all($userPrefix)
    {
        if(is_null($userPrefix)) {
            return FailedPayment::paginate(50);
        }

        return FailedPayment::query()->where('sys_trx_no', 'like', "{$userPrefix}%")->paginate(50);
    }
}
