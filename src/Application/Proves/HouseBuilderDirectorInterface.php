<?php

declare(strict_types=1);

namespace App\Application\Proves;

use App\Domain\Entity\Chair\AbstractChair;
use App\Domain\Entity\House\House;
use App\Domain\Entity\Lamp\AbstractLamp;

interface HouseBuilderDirectorInterface
{
    public function buildLightHouse(AbstractLamp $lamp): House;
    public function buildFullHouse(AbstractLamp $lamp, AbstractChair $chair): House;
}