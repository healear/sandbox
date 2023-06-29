<?php

declare(strict_types=1);

namespace App\Application\Proves;

use App\Domain\Entity\Chair\AbstractChair;
use App\Domain\Entity\House\House;
use App\Domain\Entity\House\Structure\Walls\Walls;
use App\Domain\Entity\Lamp\AbstractLamp;

interface HouseBuilderInterface
{
    public function withLamp(AbstractLamp $lamp): void;
    public function withChair(AbstractChair $chair): void;
    public function withWalls(Walls $walls): void;
    public function getHouse(): House;
    public function reset(): void;
}