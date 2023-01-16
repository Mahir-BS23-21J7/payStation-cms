<?php

namespace App\Repositories;

use App\Models\UserSubscriptionPlan;
use Carbon\Carbon;

class UserSubscriptionPlanRepository
{
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
