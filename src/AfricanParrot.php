<?php

declare(strict_types=1);

namespace Parrot;

use Override;

final class AfricanParrot extends Parrot 
{
    protected function __construct(
        private int $numberOfCoconuts
    ){
    }

    private const float LOAD_FACTOR = 9.0; 

    #[Override]
    public function getCry(): string
    {
        return 'Sqaark!';
    }

    #[Override]
    public function getSpeed(): float
    {
        return max(0, self::BASE_SPEED - self::LOAD_FACTOR * $this->numberOfCoconuts);
    }
}
