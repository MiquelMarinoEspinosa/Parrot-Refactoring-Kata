<?php

declare(strict_types=1);

namespace Parrot;

use Exception;
use PhpParser\Node\Expr\Exit_;

use function PHPUnit\Framework\throwException;

class Parrot
{
    protected function __construct(
        private int $type,
        private int $numberOfCoconuts,
        private float $voltage,
        private bool $isNailed
    ) {
    }

    public static function create(
        int $type,
        int $numberOfCoconuts,
        float $voltage,
        bool $isNailed
    ): self {
        if (ParrotTypeEnum::EUROPEAN === $type) {
            return new EuropeanParrot(
                $type,
                $numberOfCoconuts,
                $voltage,
                $isNailed
            );
        }

        return new self(
            $type,
            $numberOfCoconuts,
            $voltage,
            $isNailed
        );
    }

    /**
     * @throws Exception
     */
    public function getSpeed(): float
    {
        return match ($this->type) {
            ParrotTypeEnum::EUROPEAN => $this->getBaseSpeed(),
            ParrotTypeEnum::AFRICAN => max(0, $this->getBaseSpeed() - $this->getLoadFactor() * $this->numberOfCoconuts),
            ParrotTypeEnum::NORWEGIAN_BLUE => $this->isNailed ? 0 : $this->getBaseSpeedWith($this->voltage),
            default => throw new Exception('Should be unreachable'),
        };
    }

    /**
     * @throws Exception
     */
    public function getCry(): string
    {
        return match ($this->type) {
            ParrotTypeEnum::AFRICAN => 'Sqaark!',
            ParrotTypeEnum::NORWEGIAN_BLUE => $this->voltage > 0 ? 'Bzzzzzz' : '...',
            default => throw new Exception('Should be unreachable'),
        };
    }

    private function getBaseSpeedWith(float $voltage): float
    {
        return min(24.0, $voltage * $this->getBaseSpeed());
    }

    private function getLoadFactor(): float
    {
        return 9.0;
    }

    private function getBaseSpeed(): float
    {
        return 12.0;
    }
}
