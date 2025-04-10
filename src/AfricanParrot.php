<?php

declare(strict_types=1);

namespace Parrot;

use Override;

final class AfricanParrot extends Parrot 
{
    #[Override]
    public function getCry(): string
    {
        return 'Sqaark!';
    }

    #[Override]
    public function getSpeed(): float
    {
        return max(0, $this->getBaseSpeed() - $this->getLoadFactor() * $this->numberOfCoconuts);
    }
}
