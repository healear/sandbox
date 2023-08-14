<?php

namespace App\Tests\SeparateCategory\References;

use PHPUnit\Framework\TestCase;

class CloningReferenceTest extends TestCase
{
    /**
     * @test
     */
    public function regularCloningTest(): void
    {
        $origin = new OuterReferenceTestClassWithoutCloneMagic(0);
        $clone = clone $origin;

        $origin->internalObject->count++;
        self::assertEquals($origin->internalObject->count, $clone->internalObject->count);
    }

    /**
     * @test
     */
    public function deepCloningTest(): void
    {
        $origin = new OuterReferenceTestClassWithCloneMagic(0);
        $clone = clone $origin;

        $origin->internalObject->count++;
        self::assertNotEquals($origin->internalObject->count, $clone->internalObject->count);
    }
}
