<?php

declare(strict_types=1);

namespace Parrot;

use PHPUnit\Framework\TestCase;

final class AfricanParrotTest extends TestCase 
{
    public function testSpeedOfAfricanParrotWithOneCoconut(): void
    {
        $parrot = Parrot::create(ParrotTypeEnum::AFRICAN, 1, 0, false);
        self::assertSame(3.0, $parrot->getSpeed());
    }

    public function testSpeedOfAfricanParrotWithTwoCoconuts(): void
    {
        $parrot = Parrot::create(ParrotTypeEnum::AFRICAN, 2, 0, false);
        self::assertSame(0.0, $parrot->getSpeed());
    }

    public function testSpeedOfAfricanParrotWithNoCoconuts(): void
    {
        $parrot = Parrot::create(ParrotTypeEnum::AFRICAN, 0, 0, false);
        self::assertSame(12.0, $parrot->getSpeed());
    }

    public function testGetCryOfAfricanParrot(): void
    {
        $parrot = Parrot::create(ParrotTypeEnum::AFRICAN, 1, 0, false);
        self::assertSame('Sqaark!', $parrot->getCry());
    }
}
