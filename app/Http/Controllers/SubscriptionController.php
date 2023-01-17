<?php

namespace App\Http\Controllers;

use App\Http\Services\SubscriptionServices\SubscriptionPlanService;
use App\Http\Services\SubscriptionServices\SubscriptionPurchaseService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SubscriptionController extends Controller
{
    public function showSubscriptionPlans(Request $request, SubscriptionPlanService $subscriptionPlanService)
    {
        $allSubscriptionPlans = $subscriptionPlanService->showAllSubscriptionPlans();

        return Inertia::render('User/SubscriptionPlans', [
            'subscription_plans' => $allSubscriptionPlans
        ]);
    }

    public function purchaseSubscription(Request $request, SubscriptionPurchaseService $subscriptionPurchaseService)
    {
        $subscriptionPlanId = $request->query('subscription_plan_id');
        return $subscriptionPurchaseService->purchaseSubscription($subscriptionPlanId);
    }

    public function showUserSubscriptionHistory(Request $request)
    {
        dd($request->query());
        return Inertia::render('SubscriptionPlans');
    }
}
