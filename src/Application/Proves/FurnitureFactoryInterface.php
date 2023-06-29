<?php

declare(strict_types=1);

namespace App\Application\Proves;

use App\Domain\Entity\Chair\AbstractChair;
use App\Domain\Entity\Lamp\AbstractLamp;
use App\Domain\VolumeSize;

interface FurnitureFactoryInterface
{
    public function getChair(VolumeSize $size): AbstractChair;
    public function getLamp(VolumeSize $size, float $illumination): AbstractLamp;
}