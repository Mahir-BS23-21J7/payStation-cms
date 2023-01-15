<?php

namespace App\Http\Controllers;

use App\Http\Services\SubscriptionServices\SubscriptionPlanService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SubscriptionController extends Controller
{
    private $subscriptionPlanService;

    public function showSubscriptionPlans(SubscriptionPlanService $subscriptionPlanService)
    {
        $allSubscriptionPlans = $subscriptionPlanService->showAllSubscriptionPlans();

        return Inertia::render('User/SubscriptionPlans', [
            'subscription_plans' => $allSubscriptionPlans
        ]);
    }

    public function showSubscriptionHistory()
    {
        return Inertia::render('SubscriptionPlans');
    }
}
