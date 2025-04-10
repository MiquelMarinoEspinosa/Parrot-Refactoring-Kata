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
}
