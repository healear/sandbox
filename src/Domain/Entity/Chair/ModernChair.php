<?php

declare(strict_types=1);

namespace App\Domain\Entity\Chair;

class ModernChair extends AbstractChair
{
    public function calcPrice(): float
    {
        $size = $this->getSize();

        return $size->height()/4 + $size->length() + $size->width();
    }
}