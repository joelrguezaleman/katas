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

    public function find(int $findCriteria): AgeDifferenceBetweenTwoPeople
    {
        /** @var AgeDifferenceBetweenTwoPeople[] $ageDifferences */
        $ageDifferences = $this->getAllAgeDifferencesBetweenAllPeople();

        if (count($ageDifferences) < 1) {
            return new AgeDifferenceBetweenTwoPeople();
        }

        return $this->getAgeDifferenceByFindCriteria(
            $ageDifferences,
            $findCriteria
        );
    }

    private function getAllAgeDifferencesBetweenAllPeople(): array
    {
        $ageDifferences = [];

        for ($i = 0; $i < count($this->people); $i++) {
            for ($j = $i + 1; $j < count($this->people); $j++) {
                $ageDifferences[] = $this->buildAgeDifference(
                    $this->people[$i],
                    $this->people[$j]
                );
            }
        }

        return $ageDifferences;
    }

    private function buildAgeDifference(
        Person $person1,
        Person $person2
    ): AgeDifferenceBetweenTwoPeople {
        $ageDifferenceBetweenTwoPeople = new AgeDifferenceBetweenTwoPeople();

        if ($person1->birthDate < $person2->birthDate) {
            $ageDifferenceBetweenTwoPeople->oldest = $person1;
            $ageDifferenceBetweenTwoPeople->youngest = $person2;
        } else {
            $ageDifferenceBetweenTwoPeople->oldest = $person2;
            $ageDifferenceBetweenTwoPeople->youngest = $person1;
        }

        $ageDifferenceBetweenTwoPeople->ageDifference =
            $ageDifferenceBetweenTwoPeople->youngest->birthDate->getTimestamp()
            - $ageDifferenceBetweenTwoPeople->oldest->birthDate->getTimestamp();

        return $ageDifferenceBetweenTwoPeople;
    }

    private function getAgeDifferenceByFindCriteria(
        array $ageDifferences,
        int $findCriteria
    ): AgeDifferenceBetweenTwoPeople {
        $answer = $ageDifferences[0];

        foreach ($ageDifferences as $ageDifference) {
            switch ($findCriteria) {
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
