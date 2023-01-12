<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('successful_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_subscription_plan_id')->references('id')->on('user_subscription_plans')->onDelete('cascade')->onUpdate('cascade');
            $table->string('amount')->default(0);
            $table->string('payment_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('successful_payments');
    }
};
