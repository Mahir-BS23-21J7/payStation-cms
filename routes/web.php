<?php

use App\Http\Controllers\SubscriptionHistoryController;
use App\Http\Controllers\SubscriptionController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__ . '/auth.php';

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('landing');

// Dashboard
Route::get('/dashboard', function () {
    return Inertia::render('User/Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin/dashboard', function () {
    return Inertia::render('Admin/DashboardAdmin');
})->middleware(['auth:admin', 'verified'])->name('admin.dashboard');


// Subscription
Route::group(['prefix' => 'subscription'], function () {
    Route::get('purchase', [SubscriptionController::class, 'purchaseSubscription'])->middleware('auth')->name('subscription.purchase');
    Route::get('all-plans', [SubscriptionController::class, 'showSubscriptionPlans'])->name('subscription.plans');
    Route::get('user-history', [SubscriptionHistoryController::class, 'showUserSubscriptionHistory'])->middleware('auth')->name('subscription.user.history');
});
