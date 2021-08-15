<?php

declare(strict_types=1);

namespace App\Models\Enums;
use MyCLabs\Enum\Enum;

final class PaymentType extends Enum
{
    public const BANK_TRANSFER = 1;
    public const STRIPE = 2;
}
