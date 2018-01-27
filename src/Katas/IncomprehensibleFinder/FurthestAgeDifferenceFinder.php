<?php

namespace Katas\IncomprehensibleFinder;

class FurthestAgeDifferenceFinder extends AbstractAgeDifferenceFinder
{
    protected function isBestAgeDifference(
        int $currentAgeDifference,
        int $bestAgeDifference
    ): bool {
        return $currentAgeDifference > $bestAgeDifference;
    }
}
