<?php

declare(strict_types=1);

namespace Parrot;

abstract class Parrot
{
    protected const float BASE_SPEED = 12.0;

    abstract public function getSpeed(): float;

    abstract public function getCry(): string;
}
