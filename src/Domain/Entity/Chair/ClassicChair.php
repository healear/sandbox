<?php

declare(strict_types=1);

namespace App\Domain\Entity\Chair;

class ClassicChair extends AbstractChair
{
    private const COEFFICIENT = 2;

    public function calcPrice(): float
    {
        $size = $this->getSize();

        return self::COEFFICIENT * ($size->width() + $size->length() + $size->height()/4);
    }

}