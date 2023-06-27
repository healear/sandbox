<?php

declare(strict_types=1);

namespace App\Application\Proves;

use App\Domain\Entity\Chair\AbstractChair;
use App\Domain\Size;

interface FurnitureFactoryInterface
{
    public function getChair(Size $size): AbstractChair;
}