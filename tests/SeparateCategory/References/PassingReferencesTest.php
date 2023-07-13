<?php

declare(strict_types=1);

namespace App\Tests\SeparateCategory\References;

use PHPUnit\Framework\TestCase;

class PassingReferencesTest extends TestCase
{
    public function testPassingByReference(): void
    {
        $class = new ReferenceTestClass(0);

        $test = 0;
        $class->increment($test);
        self::assertSame(1, $test);

        $increment = function (ReferenceTestClass $class) { $class->count++; };
        $increment($class);
        self::assertSame(1, $class->count);
    }
}
