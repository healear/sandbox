<?php

declare(strict_types=1);

namespace App\Tests\SeparateCategory\References;

use Monolog\Test\TestCase;

use function PHPUnit\Framework\assertEquals;

class ReturnByReferenceTest extends TestCase
{
    public function testReturnByReference(): void
    {
        $class = new ReferenceTestClass(0);
        $ref = &$class->getValueByReference();
        assertEquals(0, $ref);

        $class->count++;
        // getValueByReference возвращает по ссылке,
        // поэтому если он изменется, изменится и значение ссылки на тот же элемент
        assertEquals(1, $ref);
    }
}