<?php

namespace Katas\IncomprehensibleFinder;

interface AgeDifferenceFinder
{
    public function getAgeDifference(
        array $ageDifferences
    ): AgeDifferenceBetweenTwoPeople;
}
