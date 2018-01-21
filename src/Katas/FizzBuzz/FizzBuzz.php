<?php

namespace Katas\FizzBuzz;

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
        return $this->isDivisibleBy($number, $fizzOrBuzz) ||
               $this->containsFizzOrBuzzDigit($number, $fizzOrBuzz);
    }

    private function isDivisibleBy(int $number, int $fizzOrBuzz): bool
    {
        return $number % $fizzOrBuzz == 0;
    }

    private function containsFizzOrBuzzDigit(int $number, int $fizzOrBuzz): bool
    {
        return strpos(strval($number), strval($fizzOrBuzz)) !== false;
    }
}
