<?php

namespace Katas\GildedRose\PHP;

class GenericQualityUpdater implements QualityUpdaterInterface
{
    public function updateQuality(Item $item)
    {
        $item->sellIn--;

        $qualityDecrease = $item->sellIn < 0 ? 2 : 1;
        $item->quality -= $qualityDecrease;

        if ($item->quality < 0) {
            $item->quality = 0;
        }
    }
}
