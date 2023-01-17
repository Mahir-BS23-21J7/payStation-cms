<?php

namespace App\Http\Services\SubscriptionServices;

use App\Models\SubscriptionPlan;

Class SubscriptionPlanService 
{
    private $subscriptionPlan;

    public function __construct(SubscriptionPlan $subscriptionPlan)
    {
        $this->subscriptionPlan = $subscriptionPlan;
    }
    public function allSubscriptionPlans()
    {
        return $this->subscriptionPlan::paginate(10);
    }
}