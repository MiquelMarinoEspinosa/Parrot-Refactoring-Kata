<?php

declare(strict_types=1);

namespace Parrot;

use Override;

final class NorwegianBlueParrot extends Parrot 
{
    #[Override]
    public function getCry(): string
    {
        return $this->voltage > 0 ? 'Bzzzzzz' : '...';
    }

    #[Override]
    public function getSpeed(): float
    {
        return $this->isNailed ? 0 : min(24.0, $this->voltage * self::BASE_SPEED);
    }
}
