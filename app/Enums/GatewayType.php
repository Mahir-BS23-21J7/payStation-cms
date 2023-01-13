<?php

namespace App\Enums;

enum GatewayType: string {
    case MFS = 'mfs';
    case OB = 'ob';
}