<?php

namespace App\Enums;

enum SubscriptionPlansType: string {
    case PAY_AS_YOU_GO = 'pay_as_you_go';
    case MONTHLY = 'monthly';
    case HALF_YEARLY = 'half_yearly';
    case YEARLY = 'yearly';
}