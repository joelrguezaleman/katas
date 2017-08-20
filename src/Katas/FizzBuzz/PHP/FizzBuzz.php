<?php

namespace Katas\FizzBuzz\PHP;

class FizzBuzz
{
    public function get(int $number): string
    {
        return $this->isFizz($number) ? 'Fizz' : $number;
    }

    private function isFizz(int $number): bool
    {
        return $number % 3 == 0;
    }
}
