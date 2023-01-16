<?php

namespace App\Repositories;

use App\Models\SubscriptionPlan;

class SubscriptionPlanRepository
{
    public function subscriptionPlanType(int $subscriptionPlanId)
    {
        return SubscriptionPlan::query()->where('id', $subscriptionPlanId)->first()?->type;
    }
}
