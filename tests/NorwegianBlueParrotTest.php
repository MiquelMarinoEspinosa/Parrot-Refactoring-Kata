<?php

declare(strict_types=1);

namespace Parrot\Tests;

use Parrot\Parrot;
use Parrot\ParrotTypeEnum;
use PHPUnit\Framework\TestCase;

final class NorwegianBlueParrotTest extends TestCase
{
    public function testSpeedNorwegianBlueParrotNailed(): void
    {
        $parrot = Parrot::create(ParrotTypeEnum::NORWEGIAN_BLUE, 0, 1.5, true);
        self::assertSame(0.0, $parrot->getSpeed());
    }

    public function testSpeedNorwegianBlueParrotNotNailed(): void
    {
        $parrot = Parrot::create(ParrotTypeEnum::NORWEGIAN_BLUE, 0, 1.5, false);
        self::assertSame(18.0, $parrot->getSpeed());
    }

    public function testSpeedNorwegianBlueParrotNotNailedHighVoltage(): void
    {
        $parrot = Parrot::create(ParrotTypeEnum::NORWEGIAN_BLUE, 0, 4, false);
        self::assertSame(24.0, $parrot->getSpeed());
    }

    public function testGetCryOfNorwegianBlueHighVoltage(): void
    {
        $parrot = Parrot::create(ParrotTypeEnum::NORWEGIAN_BLUE, 0, 4, false);
        self::assertSame('Bzzzzzz', $parrot->getCry());
    }

    public function testGetCryOfNorwegianBlueNoVoltage(): void
    {
        $parrot = Parrot::create(ParrotTypeEnum::NORWEGIAN_BLUE, 0, 0, false);
        self::assertSame('...', $parrot->getCry());
    }
}
