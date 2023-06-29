<?php

declare(strict_types=1);

namespace App\Domain\Entity\House\Structure\Walls;

class Material
{
    private const PRICES = [
      1 => 3.0,
      2 => 2.0,
      3 => 1.0,
    ];

    private int $id;
    private string $name;
    private float $pricePerCubicMeter;
    private float $pricePerSquareMeter;

    private function __construct(int $id, string $name) {
        $this->id = $id;
        $this->name = $name;

        $this->pricePerCubicMeter = self::PRICES[$this->id];
        $this->pricePerSquareMeter = self::PRICES[$this->id] * 2/3;
    }

    public static function brick(): self
    {
        return new self(1, 'Brick');
    }

    public static function stone(): self
    {
        return new self(2, 'Stone');
    }

    public static function wood(): self
    {
        return new self(3, 'Wood');
    }

    public function id(): int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function pricePerCubicMeter(): float
    {
        return $this->pricePerCubicMeter;
    }

    public function pricePerSquareMeter(): float
    {
        return $this->pricePerSquareMeter;
    }
}