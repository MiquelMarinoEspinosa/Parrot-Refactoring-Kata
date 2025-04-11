<?php

declare(strict_types=1);

namespace Parrot;

use Override;

final class NorwegianBlueParrot extends Parrot 
{
    public function __construct(
        private float $voltage,
        private bool $isNailed
    ){
        
    }

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
