<?php

declare(strict_types=1);

namespace Parrot\Tests;

use Parrot\Parrot;
use PHPUnit\Framework\TestCase;

final class ParrotTest extends TestCase
{
    public function testWhenCreateAnUnknownParrotShouldThrowAnException(): void
    {
        $this->expectExceptionMessage('Should be unreachable');
        Parrot::create(-1, 0, 0, false);
    }
}
