<?php

declare(strict_types = 1);

namespace Katas\IncomprehensibleFinder;

final class Finder
{
    /** @var AgeDifferenceFinder **/
    private $closestAgeDifferenceFinder;

    /** @var AgeDifferenceFinder **/
    private $furthestAgeDifferenceFinder;

    /** @var Person[] */
    private $people;

    public function __construct(
        array $people,
        AgeDifferenceFinder $closestAgeDifferenceFinder,
        AgeDifferenceFinder $furthestAgeDifferenceFinder
    ) {
        $this->closestAgeDifferenceFinder = $closestAgeDifferenceFinder;
        $this->furthestAgeDifferenceFinder = $furthestAgeDifferenceFinder;
        $this->people = $people;
    }

    public function find(int $findCriteria): AgeDifferenceBetweenTwoPeople
    {
        /** @var AgeDifferenceBetweenTwoPeople[] $ageDifferences */
        $ageDifferences = $this->getAllAgeDifferencesBetweenAllPeople();

        if (empty($ageDifferences)) {
            return new AgeDifferenceBetweenTwoPeople();
        }

        if ($findCriteria === FindCriteria::CLOSEST) {
            return $this->closestAgeDifferenceFinder->getAgeDifference($ageDifferences);
        } else {
            return $this->furthestAgeDifferenceFinder->getAgeDifference($ageDifferences);
        }
    }

    private function getAllAgeDifferencesBetweenAllPeople(): array
    {
        $ageDifferences = [];

        for ($i = 0; $i < count($this->people); $i++) {
            for ($j = $i + 1; $j < count($this->people); $j++) {
                $ageDifferences[] = new AgeDifferenceBetweenTwoPeople(
                    $this->people[$i],
                    $this->people[$j]
                );
            }
        }

        return $ageDifferences;
    }
}
