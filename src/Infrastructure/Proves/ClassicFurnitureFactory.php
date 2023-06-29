<?php

declare(strict_types=1);

namespace App\Infrastructure\Proves;

use App\Domain\Entity\Chair\AbstractChair;
use App\Application\Proves\FurnitureFactoryInterface;
use App\Domain\Entity\Lamp\AbstractLamp;
use App\Domain\Entity\Lamp\ClassicLamp;
use App\Domain\VolumeSize;
use App\Domain\Entity\Chair\ClassicChair;

class ClassicFurnitureFactory implements FurnitureFactoryInterface
{
    public function getChair(VolumeSize $size): AbstractChair
    {
        return new ClassicChair($size);
    }

    public function getLamp(VolumeSize $size, float $illumination): AbstractLamp
    {
        return new ClassicLamp($size, $illumination);
    }

}