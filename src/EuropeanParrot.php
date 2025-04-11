<?php

declare(strict_types=1);

namespace Parrot;

use Override;

final class EuropeanParrot implements Parrot
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
