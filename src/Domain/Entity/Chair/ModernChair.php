<?php

declare(strict_types=1);

namespace App\Domain\Entity\Chair;

use App\Domain\Entity\CoefficientEnum;

class ModernChair extends AbstractChair
{
    public function calcPrice(): float
    {
        $size = $this->size();

        return CoefficientEnum::MODERN_COEFF * ($size->height()/4 + $size->length() + $size->width());
    }
}