<?php

namespace Katas\GildedRose\PHP\QualityUpdaters;

use Katas\GildedRose\PHP\QualityUpdaterInterface;

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
