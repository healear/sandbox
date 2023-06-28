<?php

namespace App\Infrastructure\Proves;

use App\Application\Proves\HouseBuilderDirectorInterface;
use App\Application\Proves\HouseBuilderInterface;
use App\Domain\Entity\Chair\AbstractChair;
use App\Domain\Entity\House\House;
use App\Domain\Entity\Lamp\AbstractLamp;

class HouseBuilderDirector implements HouseBuilderDirectorInterface
{
    public function __construct(
      private HouseBuilderInterface $houseBuilder,
    ) {
    }

    public function buildLightHouse(AbstractLamp $lamp): House
    {
        $this->houseBuilder->withLamp($lamp);

        $house = clone $this->houseBuilder->getHouse();
        $this->houseBuilder->reset();

        return $house;
    }

    public function buildFullHouse(AbstractLamp $lamp, AbstractChair $chair): House
    {
        $this->houseBuilder->withLamp($lamp);
        $this->houseBuilder->withChair($chair);

        $house = clone $this->houseBuilder->getHouse();
        $this->houseBuilder->reset();

        return $house;
    }
}