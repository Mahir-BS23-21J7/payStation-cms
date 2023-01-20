<?php

namespace App\Http\Services\SubscriptionServices;

use App\Enums\SubscriptionPlanType;
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

        $newSubscriptionDuration = $this->nextSubscriptionDuration($subscriptionPlanId);
        // dd($userNewSubscriptionStartDate, $userNewSubscriptionEndDate);

        // Create Payment API call

        // Insert UserSubscriptionPlan with SYS_TRX_ID
        $this->userSubscriptionPlanRepository->save([
            'user_id' => Auth::user()->id,
            'subscription_plan_id' => $subscriptionPlanId,
            'starts_at' => $newSubscriptionDuration['start_date'],
            'ends_at' => $newSubscriptionDuration['end_date'],
            'paid' => true,
            'sys_trx_no' => 'test101'
        ]);
        
        // Redirect to redirect URL
        

        return redirect()->back();
    }

    public function nextSubscriptionDuration($subscriptionPlanId)
    {
        $userId = Auth::User()->id; 
        $subscriptionType = $this->subscriptionPlanRepository->subscriptionPlanType($subscriptionPlanId);
        $userLastSubscriptionEndDate = $this->userSubscriptionPlanRepository->userLastSubscriptionEndDate($userId);
        $userNewSubscriptionStartDate = Carbon::parse($userLastSubscriptionEndDate)->addDay();
        $userNewSubscriptionEndDate = null;

        if($subscriptionType == (SubscriptionPlanType::HALF_YEARLY)->value) {
            $userNewSubscriptionEndDate = Carbon::parse($userLastSubscriptionEndDate)->addDays(6 * 30);
        } elseif ($subscriptionType == (SubscriptionPlanType::YEARLY)->value) {
            $userNewSubscriptionEndDate = Carbon::parse($userLastSubscriptionEndDate)->addDays(12 * 30);
        } else {
            $userNewSubscriptionEndDate = Carbon::parse($userLastSubscriptionEndDate)->addDays(30);
        }

        return [
            'start_date' => $userNewSubscriptionStartDate->toDateTimeString(),
            'end_date' => $userNewSubscriptionEndDate->toDateTimeString()
        ];
    }
}