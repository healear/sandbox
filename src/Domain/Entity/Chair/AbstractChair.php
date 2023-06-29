<?php

declare(strict_types=1);

namespace App\Domain\Entity\Chair;

use App\Domain\VolumeSize;

abstract class AbstractChair
{
    public function __construct(
        private VolumeSize $size
    ) {
    }

    abstract public function calcPrice(): float;
    
    public function size(): VolumeSize
    {
        return $this->size;
    }
}