<?php

namespace App\Http\Services\SubscriptionServices;

use App\Enums\SubscriptionPlansType;
use App\Repositories\SubscriptionPlanRepository;
use App\Repositories\UserSubscriptionPlanRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

Class SubscriptionPurchaseService 
{
    private $subscriptionPlanRepository;
    private $userSubscriptionPlanRepository;

    public function __construct(
        SubscriptionPlanRepository $subscriptionPlanRepository,
        UserSubscriptionPlanRepository $userSubscriptionPlanRepository
    )
    {
        $this->subscriptionPlanRepository = $subscriptionPlanRepository;
        $this->userSubscriptionPlanRepository = $userSubscriptionPlanRepository;
    }
    public function purchaseSubscription(int $subscriptionPlanId)
    {
        $userId = Auth::User()->id; 
        $subscriptionType = $this->subscriptionPlanRepository->subscriptionPlanType($subscriptionPlanId);
        $userLastSubscriptionEndDate = $this->userSubscriptionPlanRepository->userLastSubscriptionEndDate($userId);
        
        $userNewSubscriptionStartDate = Carbon::parse($userLastSubscriptionEndDate)->addDay();
        $userNewSubscriptionEndDate = null;

        if($subscriptionType == SubscriptionPlansType::HALF_YEARLY) {
            $userNewSubscriptionEndDate = Carbon::parse($userLastSubscriptionEndDate)->addDays(6 * 30);
        } elseif ($subscriptionType == SubscriptionPlansType::YEARLY) {
            $userNewSubscriptionEndDate = Carbon::parse($userLastSubscriptionEndDate)->addDays(12 * 30);
        } else {
            $userNewSubscriptionEndDate = Carbon::parse($userLastSubscriptionEndDate)->addDays(30);
        }

        dd($userNewSubscriptionStartDate, $userNewSubscriptionEndDate);
    }
}