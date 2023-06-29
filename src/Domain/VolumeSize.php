<?php

declare(strict_types=1);

namespace App\Domain;

class VolumeSize
{
    public function __construct(
      private float $length,
      private float $width,
      private float $height
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

    public function height(): float
    {
        return $this->height;
    }
}