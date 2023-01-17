<?php

namespace App\Http\Controllers;

use App\Http\Services\SubscriptionServices\SubscriptionHistoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class SubscriptionHistoryController extends Controller
{
    public function showUserSubscriptionHistory(Request $request, SubscriptionHistoryService $subscriptionHistoryService)
    {
        $userId = Auth::User()->id;
        $userSubscriptionHistory = $subscriptionHistoryService->subscriptionHistory($userId);

        return Inertia::render('User/SubscriptionHistory', [
            'subscription_history' => $userSubscriptionHistory
        ]);
    }

    public function showAllUserSubscriptionHistory(Request $request)
    {
        
    }
}
