<?php

namespace Katas\FizzBuzz\PHP;

use PHPUnit\Framework\TestCase;

class FizzBuzzTest extends TestCase
{
    /**
     * @expectedException Katas\FizzBuzz\PHP\FizzBuzzException
     * @expectedExceptionMessage Parameter missing
     */
    public function testItThrowsAnExceptionIfWeDoNotPassAnyParametersToTheGetMethod()
    {
        $fizzBuzz = new FizzBuzz();

        $fizzBuzz->get();
    }
}
