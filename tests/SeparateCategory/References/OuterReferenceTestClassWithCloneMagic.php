<?php

declare(strict_types=1);

namespace App\Tests\SeparateCategory\References;

class OuterReferenceTestClassWithCloneMagic
{
    public ReferenceTestClass $internalObject;

    public function __construct(
        int $count
    ) {
        $this->internalObject = new ReferenceTestClass($count);
    }

    public function __clone(): void
    {
        $this->internalObject = clone $this->internalObject;
    }
}