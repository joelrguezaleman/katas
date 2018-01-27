<?php

namespace Katas\IncomprehensibleFinder;

class ClosestAgeDifferenceFinder extends AbstractAgeDifferenceFinder
{
    protected function isBestAgeDifference(
        int $currentAgeDifference,
        int $bestAgeDifference
    ): bool {
        return $currentAgeDifference < $bestAgeDifference;
    }
}
