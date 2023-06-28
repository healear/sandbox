<?php

namespace App\Domain\Entity\Lamp;

use App\Domain\Entity\CoefficientEnum;

class ClassicLamp extends AbstractLamp
{
    public function calcPrice(): float
    {
        $size = $this->size();

        return CoefficientEnum::CLASSIC_COEFF
            * ($size->width() + $size->length() + $size->height()/4 + $this->illumination());
    }
}