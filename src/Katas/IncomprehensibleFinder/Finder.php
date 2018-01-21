<?php

declare(strict_types = 1);

namespace Katas\IncomprehensibleFinder;

final class Finder
{
    /** @var Person[] */
    private $people;

    public function __construct(array $people)
    {
        $this->people = $people;
    }

    public function find(int $ft): AgeDifferenceBetweenTwoPeople
    {
        /** @var AgeDifferenceBetweenTwoPeople[] $ageDifferences */
        $ageDifferences = [];

        for ($i = 0; $i < count($this->people); $i++) {
            for ($j = $i + 1; $j < count($this->people); $j++) {
                $ageDifferenceBetweenTwoPeople = new AgeDifferenceBetweenTwoPeople();

                if ($this->people[$i]->birthDate < $this->people[$j]->birthDate) {
                    $ageDifferenceBetweenTwoPeople->person1 = $this->people[$i];
                    $ageDifferenceBetweenTwoPeople->person2 = $this->people[$j];
                } else {
                    $ageDifferenceBetweenTwoPeople->person1 = $this->people[$j];
                    $ageDifferenceBetweenTwoPeople->person2 = $this->people[$i];
                }

                $ageDifferenceBetweenTwoPeople->ageDifference = $ageDifferenceBetweenTwoPeople->person2->birthDate->getTimestamp()
                    - $ageDifferenceBetweenTwoPeople->person1->birthDate->getTimestamp();

                $ageDifferences[] = $ageDifferenceBetweenTwoPeople;
            }
        }

        if (count($ageDifferences) < 1) {
            return new AgeDifferenceBetweenTwoPeople();
        }

        $answer = $ageDifferences[0];

        foreach ($ageDifferences as $result) {
            switch ($ft) {
                case FT::ONE:
                    if ($result->ageDifference < $answer->ageDifference) {
                        $answer = $result;
                    }
                    break;

                case FT::TWO:
                    if ($result->ageDifference > $answer->ageDifference) {
                        $answer = $result;
                    }
                    break;
            }
        }

        return $answer;
    }
}
