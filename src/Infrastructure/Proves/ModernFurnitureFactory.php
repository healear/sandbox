<?php

declare(strict_types=1);

namespace App\Infrastructure\Proves;

use App\Application\Proves\FurnitureFactoryInterface;
use App\Domain\Entity\Chair\AbstractChair;
use App\Domain\Entity\Lamp\AbstractLamp;
use App\Domain\Entity\Lamp\ModernLamp;
use App\Domain\Size;
use App\Domain\Entity\Chair\ModernChair;

class ModernFurnitureFactory implements FurnitureFactoryInterface
{
    public function getChair(Size $size): AbstractChair
    {
        return new ModernChair($size);
    }

    public function getLamp(Size $size, float $illumination): AbstractLamp
    {
        return new ModernLamp($size, $illumination);
    }
}