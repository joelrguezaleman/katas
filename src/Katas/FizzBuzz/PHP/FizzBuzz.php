<?php

namespace Katas\FizzBuzz\PHP;

class FizzBuzz
{
    const FIZZ = 3;
    const BUZZ = 5;

    public function get(int $number): string
    {
        $result = $this->is(self::FIZZ, $number) ? 'Fizz' : '';
        $result .= $this->is(self::BUZZ, $number) ? 'Buzz' : '';

        return empty($result) ? $number : $result;
    }

    private function is(int $fizzOrBuzz, int $number): bool
    {
        return $number % $fizzOrBuzz == 0;
    }
}
