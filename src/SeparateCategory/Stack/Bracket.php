<?php

declare(strict_types=1);

namespace App\SeparateCategory\Stack;

class Bracket
{
    public function __construct(
       private string $open,
       private string $close,
    ) {
    }

    public function openBracket(): string
    {
        return $this->open;
    }

    public function closeBracket(): string
    {
        return $this->close;
    }

}