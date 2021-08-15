<?php

declare(strict_types=1);

namespace App\Models\Enums;
use MyCLabs\Enum\Enum;

final class OrderStates extends Enum
{
    public const PENDING = 'pending';
    public const PREPARING_ORDER = 'en preparación';
    public const SHIPMENT_IN_PROGRESS = 'envío en progreso';
    public const DELIVERED = 'entregado';
}
