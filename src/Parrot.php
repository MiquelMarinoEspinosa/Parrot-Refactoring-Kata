<?php

declare(strict_types=1);

namespace Parrot;

interface Parrot
{
    protected const float BASE_SPEED = 12.0;

    public function getSpeed(): float;

    public function getCry(): string;
}
