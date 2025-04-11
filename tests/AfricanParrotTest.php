<?php

declare(strict_types=1);

namespace Parrot\Tests;

use Parrot\AfricanParrot;
use PHPUnit\Framework\TestCase;

final class AfricanParrotTest extends TestCase 
{
    public function testSpeedOfAfricanParrotWithOneCoconut(): void
    {
        $parrot = new AfricanParrot(1);
        self::assertSame(3.0, $parrot->getSpeed());
    }

    public function testSpeedOfAfricanParrotWithTwoCoconuts(): void
    {
        $parrot = new AfricanParrot(2);
        self::assertSame(0.0, $parrot->getSpeed());
    }

    public function testSpeedOfAfricanParrotWithNoCoconuts(): void
    {
        $parrot = new AfricanParrot(0);
        self::assertSame(12.0, $parrot->getSpeed());
    }

    public function testGetCryOfAfricanParrot(): void
    {
        $parrot = new AfricanParrot(1);
        self::assertSame('Sqaark!', $parrot->getCry());
    }
}
