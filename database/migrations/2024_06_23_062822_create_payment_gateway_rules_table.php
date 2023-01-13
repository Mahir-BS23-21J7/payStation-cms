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
        Schema::create('payment_gateway_rules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payment_gateway_id')->references('id')->on('payment_gateways')->onDelete('cascade')->onUpdate('cascade');
            $table->string('type_of_charge');
            $table->string('value');
            $table->date('from_date');
            $table->date('to_date');
            $table->string('status');
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
        Schema::dropIfExists('payment_gateway_rules');
    }
};
