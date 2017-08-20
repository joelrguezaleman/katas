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

    public function testItReturnsTheNumberItself()
    {
        $result = $this->fizzBuzz->get(1);

        self::assertEquals('1', $result);
    }
}
