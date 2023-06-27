<?php

declare(strict_types=1);

namespace App\Infrastructure\Proves;

use App\Domain\Entity\Chair\AbstractChair;
use App\Application\Proves\FurnitureFactoryInterface;
use App\Domain\Size;
use App\Domain\Entity\Chair\ClassicChair;

class ClassicFurnitureFactory implements FurnitureFactoryInterface
{
    public function getChair(Size $size): AbstractChair
    {
        return new ClassicChair($size);
    }

}