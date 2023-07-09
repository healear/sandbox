<?php

declare(strict_types=1);

namespace App\SeparateCategory\Tree;

use SplQueue;
use SplStack;

class BinaryTree
{
    public ?Node $root = null;

    public function __construct()
    {
        $this->root = null;
    }

    public function insert(float $value): void
    {
        $node = new Node($value);
        if ($this->root === null) {
            $this->root = $node;
        } else {
            $this->insertNode($node, $this->root);
        }
    }

    public function insertNode(Node $node, ?Node &$subtree) :void
    {
        if ($subtree === null) {
            $subtree = $node;
        } else {
            if ($node->value < $subtree->value) {
                $this->insertNode($node, $subtree->leftNode);
            } else {
                $this->insertNode($node, $subtree->rightNode);
            }
        }
    }

    public function breadthFirstSearch(?float $value = null): array
    {
        $result = [];
        $queue = new SplQueue();

        if ($this->root !== null) {
            $queue->enqueue($this->root);

            while (!$queue->isEmpty()) {
                /** @var Node $current */
                $current = $queue->dequeue();

                $result[] = $current->value;

                if ($current->value === $value) {
                    return ['trace' => $result, 'found' => true];
                }

                if ($current->leftNode !== null) {
                    $queue->enqueue($current->leftNode);
                }

                if ($current->rightNode !== null) {
                    $queue->enqueue($current->rightNode);
                }
            }
        }

        return ['trace' => $result, 'found' => false];
    }

    public function depthFirstSearch(?float $value = null): array
    {
        $result = [];
        $stack = new SplStack();

        if ($this->root !== null) {
            $stack->push($this->root);

            while (!$stack->isEmpty()) {
                /** @var Node $current */
                $current = $stack->pop();
                $result[] = $current->value;

                if ($current->value === $value) {
                    return ['trace' => $result, 'found' => true];
                }

                if ($current->rightNode !== null) {
                    $stack->push($current->rightNode);
                }

                if ($current->leftNode !== null) {
                    $stack->push($current->leftNode);
                }
            }
        }

        return ['trace' => $result, 'found' => false];
    }

}