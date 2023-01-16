<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin;
use App\Models\FailedPayment;
use App\Models\Payment;
use App\Models\PaymentGateway;
use App\Models\PaymentGatewayRule;
use App\Models\SubscriptionPlan;
use App\Models\SuccessfulPayment;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Enums\GatewayType;
use App\Enums\StatusInString;
use App\Enums\GatewayChargeType;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Admin::factory(1)->create();

        User::insert([
            [
                'name' => 'Test 1',
                'email' => 'test@1.com',
                'trx_prefix' => 'test1',
                'type' => 'general',
                'hook_endpoint' => 'http://localhost:8000/subscription/payment-status',
                'password' => Hash::make('password')
            ],
            [
                'name' => 'Test 2',
                'email' => 'test@2.com',
                'trx_prefix' => 'test2',
                'type' => 'general',
                'hook_endpoint' => 'http://localhost:8000/subscription/payment-status',
                'password' => Hash::make('password')
            ]
        ]);

        Admin::factory()->create([
            'name' => 'Test Admin',
            'email' => 'test@admin.com',
            'password' => Hash::make('password')
        ]);

        SubscriptionPlan::insert([
            [
                'type' => 'pay_as_you_go',
                'price' => "0",
                'currency' => 'BDT'
            ],
            [
                'type' => 'monthly',
                'price' => "1000000",
                'currency' => 'BDT'
            ],
            [
                'type' => 'half_yearly',
                'price' => "5500000",
                'currency' => 'BDT'
            ],
            [
                'type' => 'yearly',
                'price' => "10000000",
                'currency' => 'BDT'
            ]
        ]);

        PaymentGateway::insert([
            [
                'code' => 100,
                'name' => 'bkash',
                'type' => GatewayType::MFS,
                'currency' => 'BDT',
                'logo_web' => 'weblogo',
                'logo_mobile' => 'mobilelogo',
                'status' => StatusInString::ACTIVE,
                'credentials' => json_encode([
                    "app_key" => "7epj60ddf7id0chhcm3vkejtab",
                    "baseURL" => "https://tokenized.sandbox.bka.sh/v1.2.0-beta/",
                    "password" => "sandboxTokenizedUser12345",
                    "username" => "sandboxTokenizedUser01",
                    "app_secret" => "18mvi27h9l38dtdv110rq5g603blk0fhh5hg46gfb27cp2rbs66f"
                ])
            ],
        ]);

        PaymentGatewayRule::insert([
            'payment_gateway_id' => 1,
            'type_of_charge' => GatewayChargeType::FIXED,
            'value' => 150,
            'from_date' => Carbon::now()->toDateTimeString(),
            'to_date' => Carbon::now()->addMonths(6)->toDateTimeString(),
            'status' => StatusInString::ACTIVE
        ]);

        Payment::insert([
            [
                'sys_trx_no' => 'abc',
                'gw_payment_id' => 'gw_pay_abc',
                'gw_trx_no' => 'gw_trx_abc',
                'gw_trx_ref_no' => 'gw_ref_abc',
                'sys_requested_amount' => '20000',
                'gw_approved_amount' => '20000',
                'payment_currency' => 'BDT',
                'status' => StatusInString::SUCCEED
            ],
            [
                'sys_trx_no' => 'def',
                'gw_payment_id' => 'gw_pay_def',
                'gw_trx_no' => 'gw_trx_def',
                'gw_trx_ref_no' => 'gw_ref_def',
                'sys_requested_amount' => '10000',
                'gw_approved_amount' => '10000',
                'payment_currency' => 'BDT',
                'status' => StatusInString::FAILED
            ],
        ]);

        SuccessfulPayment::insert([
            [
                'payment_id' => 1,
                'sys_trx_no' => 'abc',
                'gw_payment_id' => 'gw_pay_abc',
                'gw_trx_no' => 'gw_trx_abc',
                'gw_trx_ref_no' => 'gw_ref_abc',
                'sys_requested_amount' => '20000',
                'gw_approved_amount' => '20000',
                'payment_currency' => 'BDT'
            ]
        ]);

        FailedPayment::insert([
            [
                'payment_id' => 2,
                'sys_trx_no' => 'def',
                'gw_payment_id' => 'gw_pay_def',
                'gw_trx_no' => 'gw_trx_def',
                'gw_trx_ref_no' => 'gw_ref_def',
                'sys_requested_amount' => '10000',
                'gw_approved_amount' => '10000',
                'payment_currency' => 'BDT',
                'remarks' => 'ERROR_CODE: 500'
            ]
        ]);
    }
}