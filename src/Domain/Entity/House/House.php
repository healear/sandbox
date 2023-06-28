<?php

declare(strict_types=1);

namespace App\Domain\Entity\House;

use App\Domain\Entity\Chair\AbstractChair;
use App\Domain\Entity\Lamp\AbstractLamp;

class House
{
    public AbstractChair|null $chair;
    public AbstractLamp|null $lamp;

    public function calcPriceOfFurniture(): float
    {
        return (float)$this->lamp?->calcPrice() + (float)$this->chair?->calcPrice();
    }

    public function reset(): void
    {
        $this->chair = null;
        $this->lamp = null;
    }
}