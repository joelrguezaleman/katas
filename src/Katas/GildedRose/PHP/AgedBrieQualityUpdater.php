<?php

namespace Katas\GildedRose\PHP;

class AgedBrieQualityUpdater implements QualityUpdaterInterface
{
    public function updateQuality(Item $item)
    {
        $item->sellIn--;
        
        if ($item->quality < 50) {
            $item->quality++;
        }
    }
}
