<?php

declare(strict_types=1);

namespace App\SeparateCategory\Tree;

class Node
{
    public float $value;
    public ?Node $leftNode;
    public ?Node $rightNode;

    public function __construct(float $value)
    {
        $this->value = $value;
        $this->leftNode = null;
        $this->rightNode = null;
    }

}