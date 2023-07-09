<?php

namespace App\Tests\SeparateCategory\Stack;

use App\SeparateCategory\Stack\BracketChecker;
use Generator;
use PHPUnit\Framework\TestCase;

/**
 * @covers BracketChecker
 */
class BracketCheckerTest extends TestCase
{
    /**
     * @test
     * @dataProvider testCasesProvider
     */
    public function testCheck(string $subject, bool $expected): void
    {
        $bracketChecker = new BracketChecker();

        self::assertSame($bracketChecker->checkIfCorrectString($subject), $expected);
    }

    public function testCasesProvider(): Generator
    {
        yield 'string_without_brackets' => [
            'subject' => 'abc',
            'expected' => true,
        ];

        yield 'string_with_curved_brackets' => [
            'subject' => '{abc}',
            'expected' => true,
        ];

        yield 'string_with_square_brackets' => [
            'subject' => '[abc]',
            'expected' => true,
        ];

        yield 'string_with_round_brackets' => [
            'subject' => '(abc)',
            'expected' => true,
        ];

        yield 'wrong_string_with_round_brackets' => [
            'subject' => '(abc})',
            'expected' => false,
        ];

        yield 'wrong_string_with_square_brackets' => [
            'subject' => '[abc}]',
            'expected' => false,
        ];

        yield 'wrong_string_with_curved_brackets' => [
            'subject' => '{abc}}',
            'expected' => false,
        ];

        yield 'string_with_all_brackets' => [
            'subject' => '[{a[b(c)]}]',
            'expected' => true,
        ];

        yield 'wrong_string_with_all_brackets' => [
            'subject' => '[{a[b(c)]]}]',
            'expected' => false,
        ];
    }


}
