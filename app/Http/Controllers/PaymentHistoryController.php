<?php

namespace App\Http\Controllers;

use App\Http\Services\PaymentServices\PaymentHistoryService;
use App\Http\Services\SubscriptionServices\SubscriptionPlanService;
use App\Http\Services\SubscriptionServices\SubscriptionPurchaseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class PaymentHistoryController extends Controller
{
    public function allPayments(Request $request, PaymentHistoryService $paymentHistoryService)
    {
        dd($request->query());
        if(Auth::guard('admin')->check()) {
            // return everything from payment table
        }

        $user = Auth::user();
        $paymentHistory = $paymentHistoryService->allPayments($user->trx_prefix);

        return Inertia::render('User/PaymentHistory', [
            'payment_history' => $paymentHistory
        ]);
    }

    public function successfulPayments()
    {
        
    }

    public function failedPayments()
    {
        
    }
}
