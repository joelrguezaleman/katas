<?php

namespace Katas\GildedRose\PHP;

class ConjuredManaCakeQualityUpdater implements QualityUpdaterInterface
{
    public function updateQuality(Item $item)
    {
        $item->sellIn--;

        $qualityDecrease = $item->sellIn < 0 ? 4 : 2;
        $item->quality -= $qualityDecrease;

        if ($item->quality < 0) {
            $item->quality = 0;
        }
    }
}
