<?php

namespace App\Enums;

enum UserType: string {
    case GENERAL = 'general';
    case SUPREME = 'supreme';
    case INHOUSE = 'inhouse';
}