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
        Schema::create('successful_refunds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('refund_id')->references('id')->on('refunds')->onUpdate('cascade');
            $table->foreignId('successful_payment_id')->references('id')->on('successful_payments')->onUpdate('cascade');
            $table->string('sys_trx_no');
            $table->string('gw_payment_id');
            $table->string('sys_requested_amount');
            $table->string('gw_approved_amount');
            $table->string('currency');
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
        Schema::dropIfExists('successful_refunds');
    }
};
