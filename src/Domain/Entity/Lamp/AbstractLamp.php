<?php

declare(strict_types=1);

namespace App\Domain\Entity\Lamp;
use App\Domain\Size;

abstract class AbstractLamp
{
    public function __construct(
        private Size $size,
        private float $illumination,
    ) {
    }

    public function size(): Size
    {
        return $this->size;
    }

    public function illumination(): float
    {
        return $this->illumination;
    }

    abstract public function calcPrice(): float;
}