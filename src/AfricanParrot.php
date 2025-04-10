<?php

declare(strict_types=1);

namespace Parrot;

use Override;

final class AfricanParrot extends Parrot 
{
    private const float LOAD_FACTOR = 9.0; 

    #[Override]
    public function getCry(): string
    {
        return 'Sqaark!';
    }

    #[Override]
    public function getSpeed(): float
    {
        return max(0, $this->getBaseSpeed() - self::LOAD_FACTOR * $this->numberOfCoconuts);
    }
}
