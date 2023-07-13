<?php

namespace App\Tests\SeparateCategory\References;

use PHPUnit\Framework\TestCase;

class AssignmentReferencesTest extends TestCase
{
    public function testAssignment(): void
    {
        $var = 1;
        $ref1 = &$var;
        $ref2 = &$ref1;

        $var = 2;
        self::assertEquals(2, $ref1);
        self::assertEquals(2, $ref2);

        $ref1 = 3;
        self::assertEquals(3, $var);
        self::assertEquals(3, $ref2);

        $ref2 = 4;
        self::assertEquals(4, $var);
        self::assertEquals(4, $ref1);
    }

    public function testUninitialised(): void
    {
        $fn = static function (&$var) { };
        $fn($a);
        self::assertNull($a);

        $fn = static function (&$var) { $var = 0; };
        $fn($b);
        self::assertEquals(0, $b);
    }

    public function testForeach(): void
    {
        //не знаю, кому в голову придет так сделать, но если так сделать, это будет работать так
        $var = 0;
        $ref = &$var;
        foreach ([1, 2, 3] as $ref) {}

        self::assertEquals(3, $var);
    }
}
