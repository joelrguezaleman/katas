<?php

namespace Katas\IncomprehensibleFinder;

class FurthestAgeDifferenceFinder extends AbstractAgeDifferenceFinder
{
    protected function isBestAgeDifference(
        int $ageDifference,
        int $bestAgeDifference
    ): bool {
        return $ageDifference > $bestAgeDifference;
    }
}
