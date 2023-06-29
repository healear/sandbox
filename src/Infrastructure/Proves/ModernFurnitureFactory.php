<?php

declare(strict_types=1);

namespace App\Infrastructure\Proves;

use App\Application\Proves\FurnitureFactoryInterface;
use App\Domain\Entity\Chair\AbstractChair;
use App\Domain\Entity\Lamp\AbstractLamp;
use App\Domain\Entity\Lamp\ModernLamp;
use App\Domain\VolumeSize;
use App\Domain\Entity\Chair\ModernChair;

class ModernFurnitureFactory implements FurnitureFactoryInterface
{
    public function getChair(VolumeSize $size): AbstractChair
    {
        return new ModernChair($size);
    }

    public function getLamp(VolumeSize $size, float $illumination): AbstractLamp
    {
        return new ModernLamp($size, $illumination);
    }
}