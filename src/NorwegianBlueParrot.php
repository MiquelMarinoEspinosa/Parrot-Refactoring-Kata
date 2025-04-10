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
        return $this->isNailed ? 0 : $this->getBaseSpeedWith($this->voltage);
    }

    private function getBaseSpeedWith(float $voltage): float
    {
        return min(24.0, $voltage * $this->getBaseSpeed());
    }
}
