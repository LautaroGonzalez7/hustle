<?php

declare(strict_types=1);

namespace App\Models\Enums;
use MyCLabs\Enum\Enum;

final class Scopes extends Enum
{
    public const OCASIONES = 1;
    public const TIPOS = 2;
    public const REGALOS = 3;
    public const POSTRES = 4;
}
