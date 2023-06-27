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

    abstract protected function calcPrice(): float;
    
    public function getSize(): Size
    {
        return $this->size;
    }
}