<?php

namespace Katas\IncomprehensibleFinder;

class AgeDifferenceFinderFactory
{
    public function create(int $findCriteria): AgeDifferenceFinder
    {
        if ($findCriteria === FindCriteria::CLOSEST) {
            return new ClosestAgeDifferenceFinder();
        } else {
            return new FurthestAgeDifferenceFinder();
        }
    }
}
