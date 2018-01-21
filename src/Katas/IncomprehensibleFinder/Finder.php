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
                    $ageDifferenceBetweenTwoPeople->oldest = $this->people[$i];
                    $ageDifferenceBetweenTwoPeople->youngest = $this->people[$j];
                } else {
                    $ageDifferenceBetweenTwoPeople->oldest = $this->people[$j];
                    $ageDifferenceBetweenTwoPeople->youngest = $this->people[$i];
                }

                $ageDifferenceBetweenTwoPeople->ageDifference =
                    $ageDifferenceBetweenTwoPeople->youngest->birthDate->getTimestamp()
                    - $ageDifferenceBetweenTwoPeople->oldest->birthDate->getTimestamp();

                $ageDifferences[] = $ageDifferenceBetweenTwoPeople;
            }
        }

        if (count($ageDifferences) < 1) {
            return new AgeDifferenceBetweenTwoPeople();
        }

        $answer = $ageDifferences[0];

        foreach ($ageDifferences as $ageDifference) {
            switch ($ft) {
                case FindCriteria::CLOSEST:
                    if ($ageDifference->ageDifference < $answer->ageDifference) {
                        $answer = $ageDifference;
                    }
                    break;

                case FindCriteria::FURTHEST:
                    if ($ageDifference->ageDifference > $answer->ageDifference) {
                        $answer = $ageDifference;
                    }
                    break;
            }
        }

        return $answer;
    }
}
