<?php

declare(strict_types=1);

namespace App\Domain\Entity\House;

interface ClonableHouseInterface
{
    public function cloneWithFurniture(): House;
    public function cloneOnlyStructure(): House;
}