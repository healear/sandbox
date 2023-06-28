<?php

declare(strict_types=1);

namespace App\Infrastructure\Proves;

use App\Domain\Entity\Chair\AbstractChair;
use App\Application\Proves\FurnitureFactoryInterface;
use App\Domain\Entity\Lamp\AbstractLamp;
use App\Domain\Entity\Lamp\ClassicLamp;
use App\Domain\Size;
use App\Domain\Entity\Chair\ClassicChair;

class ClassicFurnitureFactory implements FurnitureFactoryInterface
{
    public function getChair(Size $size): AbstractChair
    {
        return new ClassicChair($size);
    }

    public function getLamp(Size $size, float $illumination): AbstractLamp
    {
        return new ClassicLamp($size, $illumination);
    }

}