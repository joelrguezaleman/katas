<?php

namespace Katas\GildedRose\PHP\QualityUpdaters;

abstract class AbstractQualityUpdater implements QualityUpdaterInterface
{
    private $increment;

    public function __construct(int $increment)
    {
        $this->increment = $increment;
    }

    protected function increment(): int
    {
        return $this->increment;
    }
}
