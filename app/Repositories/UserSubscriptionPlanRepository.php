<?php

namespace App\Repositories;

use App\Models\UserSubscriptionPlan;
use Carbon\Carbon;

class UserSubscriptionPlanRepository
{
    public function save(array $data) 
    {
        return UserSubscriptionPlan::create($data);
    }

    public function userLastSubscriptionEndDate(int $userId)
    {
        return UserSubscriptionPlan::query()
            ->where('user_id', $userId)
            ->whereDate('ends_at', '>=', Carbon::now()->toDateTimeString())
            ->get()
            ->last()
            ?->ends_at;
    }
}
