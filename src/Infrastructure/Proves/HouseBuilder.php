<?php

namespace App\Infrastructure\Proves;

use App\Application\Proves\HouseBuilderInterface;
use App\Domain\Entity\Chair\AbstractChair;
use App\Domain\Entity\House\House;
use App\Domain\Entity\House\Structure\Walls\Walls;
use App\Domain\Entity\Lamp\AbstractLamp;

class HouseBuilder implements HouseBuilderInterface
{
    private House $house;

    public function __construct()
    {
        $this->house = new House(null, null, null);
    }

    public function withLamp(AbstractLamp $lamp): void
    {
        $this->house->lamp = $lamp;
    }

    public function withChair(AbstractChair $chair): void
    {
        $this->house->chair = $chair;
    }

    public function withWalls(Walls $walls): void
    {
        $this->house->walls = $walls;
    }

    public function getHouse(): House
    {
        return $this->house;
    }

    public function reset(): void
    {
        $this->house->reset();
    }
}