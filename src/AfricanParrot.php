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
}
