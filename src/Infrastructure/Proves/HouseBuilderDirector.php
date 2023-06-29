<?php

namespace App\Infrastructure\Proves;

use App\Application\Proves\HouseBuilderDirectorInterface;
use App\Application\Proves\HouseBuilderInterface;
use App\Domain\Entity\Chair\AbstractChair;
use App\Domain\Entity\House\House;
use App\Domain\Entity\House\Structure\Walls\Walls;
use App\Domain\Entity\Lamp\AbstractLamp;

class HouseBuilderDirector implements HouseBuilderDirectorInterface
{
    public function __construct(
      private HouseBuilderInterface $houseBuilder,
    ) {
    }

    public function buildLightHouse(Walls $walls, AbstractLamp $lamp): House
    {
        $this->houseBuilder->withWalls($walls);
        $this->houseBuilder->withLamp($lamp);

        $house = $this->houseBuilder->getHouse()->cloneWithFurniture();
        $this->houseBuilder->reset();

        return $house;
    }

    public function buildFullHouse(
        Walls $walls,
        AbstractLamp $lamp,
        AbstractChair $chair,
    ): House {
        $this->houseBuilder->withWalls($walls);
        $this->houseBuilder->withLamp($lamp);
        $this->houseBuilder->withChair($chair);

        $house = $this->houseBuilder->getHouse()->cloneWithFurniture();
        $this->houseBuilder->reset();

        return $house;
    }
}