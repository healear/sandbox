<?php

declare(strict_types=1);

namespace App\SeparateCategory\Stack;

use App\Tests\SeparateCategory\Stack\BracketCheckerTest;
use SplStack;

/**
 * @see BracketCheckerTest
 */
class BracketChecker
{
    private const OPEN_BRACKETS = [
      '(',
      '{',
      '[',
    ];

    public const CLOSE_BRACKETS = [
      ')',
      '}',
      ']',
    ];

    public function __construct()
    {
    }

    public function checkIfCorrectString(string $subject): bool
    {
        $brackets = [
            '(' => new Bracket('(', ')'),
            '{' => new Bracket('{', '}'),
            '[' => new Bracket('[', ']'),
        ];

        $stack = new SplStack();
        $subject = str_split($subject);

        foreach ($subject as $char) {
            if (in_array($char, self::OPEN_BRACKETS))
            {
                $stack->push($brackets[$char]);
                continue;
            }

            if (in_array($char, self::CLOSE_BRACKETS))
            {
                if ($stack->isEmpty()) {
                    return false;
                }

                /** @var Bracket $stackValue */
                $stackValue = $stack->pop();
                if ($stackValue->closeBracket() === $char) {
                    continue;
                }

                return false;
            }
        }

        return true;
    }
}