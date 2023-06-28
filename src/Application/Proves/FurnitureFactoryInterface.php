<?php

declare(strict_types=1);

namespace App\Application\Proves;

use App\Domain\Entity\Chair\AbstractChair;
use App\Domain\Entity\Lamp\AbstractLamp;
use App\Domain\Size;

interface FurnitureFactoryInterface
{
    public function getChair(Size $size): AbstractChair;
    public function getLamp(Size $size, float $illumination): AbstractLamp;
}