<?php

namespace App\Http\Services\SubscriptionServices;

use App\Models\SubscriptionPlan;
use App\Repositories\UserSubscriptionPlanRepository;

Class SubscriptionHistoryService 
{
    private $userSubscriptionPlanRepository;

    public function __construct(UserSubscriptionPlanRepository $userSubscriptionPlanRepository)
    {
        $this->userSubscriptionPlanRepository = $userSubscriptionPlanRepository;
    }

    public function subscriptionHistory(int|null $userId = null)
    {
        return $this->userSubscriptionPlanRepository->allSubscriptions($userId);       
    }
}