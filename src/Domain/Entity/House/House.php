<?php

declare(strict_types=1);

namespace App\Domain\Entity\House;

use App\Domain\Entity\Chair\AbstractChair;
use App\Domain\Entity\House\Structure\Walls\Walls;
use App\Domain\Entity\Lamp\AbstractLamp;

class House implements ClonableHouseInterface
{
    public AbstractChair|null $chair;
    public AbstractLamp|null $lamp;
    public Walls|null $walls;

    public function __construct(
      ?AbstractChair $chair,
      ?AbstractLamp $lamp,
        ?Walls $walls,
    ) {
        $this->chair = $chair;
        $this->lamp = $lamp;
        $this->walls = $walls;
    }

    public function calcPriceOfFurniture(): float
    {
        return (float)$this->lamp?->calcPrice() + (float)$this->chair?->calcPrice();
    }

    public function calcPriceOfConstruction(): float
    {
        return $this->walls?->price();
    }

    public function calcOverallPrice(): float
    {
        return $this->calcPriceOfConstruction() + $this->calcPriceOfFurniture();
    }

    public function reset(): void
    {
        $this->chair = null;
        $this->lamp = null;
    }

    public function cloneWithFurniture(): House
    {
        return new House($this->chair, $this->lamp, $this->walls);
    }

    public function cloneOnlyStructure(): House
    {
        return new House(null, null, $this->walls);
    }
}