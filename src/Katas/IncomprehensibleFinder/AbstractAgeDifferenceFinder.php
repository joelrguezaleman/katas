<?php

namespace Katas\IncomprehensibleFinder;

abstract class AbstractAgeDifferenceFinder implements AgeDifferenceFinder
{
    public function getAgeDifference(
        array $ageDifferences
    ): AgeDifferenceBetweenTwoPeople {
        $bestAgeDifference = $ageDifferences[0];

        foreach ($ageDifferences as $ageDifference) {
            if ($this->isBestAgeDifference(
                $ageDifference->ageDifference,
                $bestAgeDifference->ageDifference
            )) {
                $bestAgeDifference = $ageDifference;
            }
        }

        return $bestAgeDifference;
    }

    abstract protected function isBestAgeDifference(
        int $ageDifference,
        int $bestAgeDifference
    ): bool;
}
