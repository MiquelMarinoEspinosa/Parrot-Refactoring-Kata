<?php

declare(strict_types=1);

namespace Parrot;

use Override;

final class EuropeanParrot extends Parrot
{
    public function __construct()
    {
    }

    #[Override]
    public function getCry(): string
    {
        return 'Sqoork!';
    }

    #[Override]
    public function getSpeed(): float
    {
        return self::BASE_SPEED;
    }
}
