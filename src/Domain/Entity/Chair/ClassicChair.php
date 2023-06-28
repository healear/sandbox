<?php

declare(strict_types=1);

namespace App\Domain\Entity\Chair;

use App\Domain\Entity\CoefficientEnum;

class ClassicChair extends AbstractChair
{

    public function calcPrice(): float
    {
        $size = $this->size();

        return CoefficientEnum::CLASSIC_COEFF * ($size->width() + $size->length() + $size->height()/4);
    }

}