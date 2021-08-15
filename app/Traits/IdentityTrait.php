<?php

declare(strict_types=1);

namespace App\Traits;

trait IdentityTrait
{
    public function getId(): int
    {
        return $this->id;
    }
}
