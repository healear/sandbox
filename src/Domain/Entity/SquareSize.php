<?php

declare(strict_types=1);

namespace App\Domain\Entity;

class SquareSize
{
    public function __construct(
      private float $length,
        private float $width,
    ) {
    }

    public function length(): float
    {
        return $this->length;
    }

    public function width(): float
    {
        return $this->width;
    }
}