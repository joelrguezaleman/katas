<?php

namespace Katas\FizzBuzz\PHP;

use PHPUnit\Framework\TestCase;

class FizzBuzzTest extends TestCase
{
    private $fizzBuzz;

    public function setUp()
    {
        parent::setUp();

        $this->fizzBuzz = new FizzBuzz();
    }

    public function tearDown()
    {
        unset($this->fizzBuzz);

        parent::tearDown();
    }

    /**
     * @expectedException TypeError
     */
    public function testItThrowsAnExceptionIfWeDoNotPassAnyParametersToTheGetMethod()
    {
        $this->fizzBuzz->get();
    }

    /**
     * @dataProvider numberProvider
     */
    public function testItReturnsTheCorrectResultDependingOnTheNumber(
        int $number,
        string $expectedResult
    ) {
        $result = $this->fizzBuzz->get($number);

        self::assertEquals($expectedResult, $result);
    }

    public function numberProvider()
    {
        return [
            [1, '1'],
            [3, 'Fizz'],
            [5, 'Buzz'],
            [15, 'FizzBuzz'],
        ];
    }
}
