<?php

namespace App\Repositories;

use App\Models\SuccessfulPayment;

class SuccessfulPaymentRepository
{
    public function all($userPrefix)
    {
        if(is_null($userPrefix)) {
            return SuccessfulPayment::paginate(50);
        }

        return SuccessfulPayment::query()->where('sys_trx_no', 'like', "{$userPrefix}%")->paginate(50);
    }
}
