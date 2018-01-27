<?php

namespace Katas\IncomprehensibleFinder;

abstract class AbstractAgeDifferenceFinder implements AgeDifferenceFinder
{
    public function getAgeDifference(
        array $ageDifferences
    ): AgeDifferenceBetweenTwoPeople {
        $bestAgeDifference = $ageDifferences[0];

        foreach ($ageDifferences as $currentAgeDifference) {
            if ($this->isBestAgeDifference(
                $currentAgeDifference->ageDifference,
                $bestAgeDifference->ageDifference
            )) {
                $bestAgeDifference = $currentAgeDifference;
            }
        }

        return $bestAgeDifference;
    }

    abstract protected function isBestAgeDifference(
        int $currentAgeDifference,
        int $bestAgeDifference
    ): bool;
}
