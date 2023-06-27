<?php

declare(strict_types=1);

namespace App\Infrastructure\Proves;

use App\Application\Proves\FurnitureFactoryInterface;
use App\Domain\Entity\Chair\AbstractChair;
use App\Domain\Size;
use App\Domain\Entity\Chair\ModernChair;

class ModernFurnitureFactory implements FurnitureFactoryInterface
{
    public function getChair(Size $size): AbstractChair
    {
        return new ModernChair($size);
    }
}