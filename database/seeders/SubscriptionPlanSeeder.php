<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\SubscriptionPlan;

class SubscriptionPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $plans = [
            [
                'type' => 'pay_as_you_go',
                'price' => "0"
            ],
            [
                'type' => 'monthly',
                'price' => "1000000"
            ],
            [
                'type' => 'half_yearly',
                'price' => "5500000"
            ],
            [
                'type' => 'yearly',
                'price' => "10000000"
            ]
        ];

       SubscriptionPlan::insert($plans);
    }
}
