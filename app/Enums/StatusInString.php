<?php

namespace App\Enums;

enum StatusInString: string {
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
    case INITIATED = 'initiated';
    case SUCCEED = 'succeed';
    case FAILED = 'failed';
    case CANCELED = 'canceled';
    case PENDING = 'pending';

}