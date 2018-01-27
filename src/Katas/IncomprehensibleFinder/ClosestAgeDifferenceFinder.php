<?php

namespace Katas\IncomprehensibleFinder;

class ClosestAgeDifferenceFinder extends AbstractAgeDifferenceFinder
{
    protected function isBestAgeDifference(
        int $ageDifference,
        int $bestAgeDifference
    ): bool {
        return $ageDifference < $bestAgeDifference;
    }
}
