<?php

declare(strict_types=1);

namespace Parrot;

use Exception;

abstract class Parrot
{
    protected function __construct(
        private int $type,
        protected int $numberOfCoconuts,
        protected float $voltage,
        protected bool $isNailed
    ) {
    }

    /**
     * @throws Exception
     */
    public static function create(
        int $type,
        int $numberOfCoconuts,
        float $voltage,
        bool $isNailed
    ): self {
        return match ($type) {
            ParrotTypeEnum::EUROPEAN => new EuropeanParrot(
                $type,
                $numberOfCoconuts,
                $voltage,
                $isNailed
            ),
            ParrotTypeEnum::AFRICAN => new AfricanParrot(
                $type,
                $numberOfCoconuts,
                $voltage,
                $isNailed
            ),
            ParrotTypeEnum::NORWEGIAN_BLUE => new NorwegianBlueParrot(
                $type,
                $numberOfCoconuts,
                $voltage,
                $isNailed
            ),
            default => throw new Exception('Should be unreachable'),
        };
    }

    /**
     * @throws Exception
     */
    public function getSpeed(): float
    {
        return match ($this->type) {
            default => throw new Exception('Should be unreachable'),
        };
    }

    abstract public function getCry(): string;

    protected function getBaseSpeedWith(float $voltage): float
    {
        return min(24.0, $voltage * $this->getBaseSpeed());
    }

    protected function getLoadFactor(): float
    {
        return 9.0;
    }

    protected function getBaseSpeed(): float
    {
        return 12.0;
    }
}
