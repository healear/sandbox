<?php

declare(strict_types=1);

namespace App\Domain\Entity\House\Structure\Walls;

use App\Domain\VolumeSize;

class Walls
{
    private float $price;
    /**
     * @param Material $material
     * @param VolumeSize[] $walls
     */
    public function __construct(
        private Material $material,
        private array $walls,
    ) {
        $sum = 0;

        foreach ($this->walls as $wall) {
            $sum += $wall->volume() * $this->material->pricePerCubicMeter();
        }

        $this->price = $sum;
    }

    /**
     * @return VolumeSize[]
     */
    public function walls(): array
    {
        return $this->walls;
    }

    public function material(): Material
    {
        return $this->material;
    }

    public function price(): float
    {
        return $this->price;
    }
}