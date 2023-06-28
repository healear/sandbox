<?php

declare(strict_types=1);

namespace App\Domain\Entity\Chair;

use App\Domain\Size;

abstract class AbstractChair
{
    public function __construct(
        private Size $size
    ) {
    }

    abstract public function calcPrice(): float;
    
    public function size(): Size
    {
        return $this->size;
    }
}