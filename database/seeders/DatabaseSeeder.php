<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

        \App\Models\Admin::factory()->create([
            'name' => 'Test Admin',
            'email' => 'test@admin.com',
            'password' => Hash::make('password')
        ]);

        $this->call([
            SubscriptionPlanSeeder::class,
        ]);
    }
}
