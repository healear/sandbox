<?php

declare(strict_types=1);

namespace App\Domain\Entity\Lamp;
use App\Domain\VolumeSize;

abstract class AbstractLamp
{
    public function __construct(
        private VolumeSize $size,
        private float $illumination,
    ) {
    }

    public function size(): VolumeSize
    {
        return $this->size;
    }

    public function illumination(): float
    {
        return $this->illumination;
    }

    abstract public function calcPrice(): float;
}