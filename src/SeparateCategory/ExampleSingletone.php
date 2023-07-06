<?php

namespace App\SeparateCategory;

class ExampleSingletone
{
    private static ExampleSingletone $exampleSingletone;

    private function __construct()
    {
    }

    public function getInstance(): ExampleSingletone
    {
        if (self::$exampleSingletone === null) {
            self::$exampleSingletone = new self();
        }

        return self::$exampleSingletone;
    }

}