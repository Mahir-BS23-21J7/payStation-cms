<?php

namespace App\Enums;

enum GatewayChargeType: string {
    case FIXED = 'fixed';
    case PERCENTAGE = 'percentage';
}