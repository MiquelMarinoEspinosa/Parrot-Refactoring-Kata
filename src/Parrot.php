<?php

declare(strict_types=1);

namespace Parrot;

use Exception;

abstract class Parrot
{
    protected const float BASE_SPEED = 12.0;

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

    abstract public function getSpeed(): float;

    abstract public function getCry(): string;
}
