<?php

namespace Katas\IncomprehensibleFinder;

class AgeDifferenceFinder
{
    public function getClosestAgeDifference(
        array $ageDifferences
    ): AgeDifferenceBetweenTwoPeople {
        $answer = $ageDifferences[0];

        foreach ($ageDifferences as $ageDifference) {
            if ($ageDifference->ageDifference < $answer->ageDifference) {
                $answer = $ageDifference;
            }
        }

        return $answer;
    }

    public function getFurthestAgeDifference(
        array $ageDifferences
    ): AgeDifferenceBetweenTwoPeople {
        $answer = $ageDifferences[0];

        foreach ($ageDifferences as $ageDifference) {
            if ($ageDifference->ageDifference > $answer->ageDifference) {
                $answer = $ageDifference;
            }
        }

        return $answer;
    }
}
