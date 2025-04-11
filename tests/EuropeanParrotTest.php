<?php

declare(strict_types=1);

namespace Parrot;

use PHPUnit\Framework\TestCase;

final class EuropeanParrotTest extends TestCase 
{
    public function testGetCryOfEuropeanParrot(): void
    {
        $parrot = new EuropeanParrot();
        self::assertSame('Sqoork!', $parrot->getCry());
    }

    public function testSpeedOfEuropeanParrot(): void
    {
        $parrot = new EuropeanParrot();
        self::assertSame(12.0, $parrot->getSpeed());
    }
}
