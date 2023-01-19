<?php

use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\SubscriptionHistoryController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\SubscriptionController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'subscription'], function () {
    
    // For All
    Route::get('all-plans', [SubscriptionController::class, 'showSubscriptionPlans'])->name('subscription.plans');
    
    // For User
    Route::get('purchase', [SubscriptionController::class, 'purchaseSubscription'])->middleware('auth')->name('subscription.purchase');
    Route::get('user-history', [SubscriptionHistoryController::class, 'showUserSubscriptionHistory'])->middleware('auth')->name('subscription.user.history');
});