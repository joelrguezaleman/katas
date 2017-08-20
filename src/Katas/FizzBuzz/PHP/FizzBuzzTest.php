<?php

namespace Katas\FizzBuzz\PHP;

use PHPUnit\Framework\TestCase;

class FizzBuzzTest extends TestCase
{
    public function testGetMethodExists()
    {
        $fizzBuzz = new FizzBuzz();

        $fizzBuzz->get();
    }
}
