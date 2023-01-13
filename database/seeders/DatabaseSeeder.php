<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin;
use App\Models\PaymentGateway;
use App\Models\PaymentGatewayRule;
use App\Models\SubscriptionPlan;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Enums\GatewayType;
use App\Enums\StatusInString;
use App\Enums\GatewayChargeType;

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
    }
}