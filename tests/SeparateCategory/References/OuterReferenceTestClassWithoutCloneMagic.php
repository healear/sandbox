<?php

declare(strict_types=1);

namespace App\Tests\SeparateCategory\References;

class OuterReferenceTestClassWithoutCloneMagic
{
    public ReferenceTestClass $internalObject;

    public function __construct(
        int $count
    ) {
        $this->internalObject = new ReferenceTestClass($count);
    }
}