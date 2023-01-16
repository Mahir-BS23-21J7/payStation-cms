<?php

namespace App\Http\Controllers;

use App\Http\Services\SubscriptionServices\SubscriptionPurchaseService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SubscriptionPurchaseController extends Controller
{
    private $subscriptionPurchaseService;

    public function purchaseSubscription(Request $request, SubscriptionPurchaseService $subscriptionPurchaseService)
    {
        $subscriptionPlanId = $request->query('subscription_plan_id');
        return $subscriptionPurchaseService->purchaseSubscription($subscriptionPlanId);
    }
}
