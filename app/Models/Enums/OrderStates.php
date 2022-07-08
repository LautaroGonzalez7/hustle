<?php

declare(strict_types=1);

namespace App\Models\Enums;
use MyCLabs\Enum\Enum;

final class OrderStates extends Enum
{
    public const PENDING = 'PENDING';
    public const PREPARING_ORDER = 'PREPARING_ORDER';
    public const SHIPMENT_IN_PROGRESS = 'SHIPMENT_IN_PROGRESS';
    public const DELIVERED = 'DELIVERED';
}
