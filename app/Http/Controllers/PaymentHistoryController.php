<?php

namespace App\Http\Controllers;

use App\Http\Services\SubscriptionServices\SubscriptionPlanService;
use App\Http\Services\SubscriptionServices\SubscriptionPurchaseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class PaymentHistoryController extends Controller
{
    public function allPayments()
    {
        if(Auth::guard('admin')->check()) {
            // return everything from payment table
        }

        $user = Auth::user();
    }

    public function successfulPayments()
    {
        
    }

    public function failedPayments()
    {
        
    }
}
