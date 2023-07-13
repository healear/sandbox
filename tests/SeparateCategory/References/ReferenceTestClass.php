<?php

declare(strict_types=1);

namespace App\Tests\SeparateCategory\References;

class ReferenceTestClass
{
    public function __construct(
      public int $count,
    ) {
    }

    public function increment(int &$var): void
    {
        ++$var;
    }
}