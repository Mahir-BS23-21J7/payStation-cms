<?php

use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\SubscriptionController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'subscription', 'middleware' => ['auth']], function () {
    Route::get('all-plans', [SubscriptionController::class, 'showSubscriptionPlans'])->name('subscription.plans');
    Route::get('user-history', [SubscriptionController::class, 'showSubscriptionHistory'])->name('subscription.user.history');
});