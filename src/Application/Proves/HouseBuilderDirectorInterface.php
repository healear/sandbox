<?php

declare(strict_types=1);

namespace App\Application\Proves;

use App\Domain\Entity\Chair\AbstractChair;
use App\Domain\Entity\House\House;
use App\Domain\Entity\House\Structure\Walls\Walls;
use App\Domain\Entity\Lamp\AbstractLamp;

interface HouseBuilderDirectorInterface
{
    public function buildLightHouse(Walls $walls, AbstractLamp $lamp): House;
    public function buildFullHouse(Walls $walls, AbstractLamp $lamp, AbstractChair $chair): House;
}