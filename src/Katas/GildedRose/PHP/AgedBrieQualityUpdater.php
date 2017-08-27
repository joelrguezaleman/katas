<?php

namespace Katas\GildedRose\PHP;

class AgedBrieQualityUpdater implements QualityUpdaterInterface
{
    public function updateQuality(Item $item)
    {
        $item->sellIn = $item->sellIn - 1;
        
        if ($item->quality < 50) {
            $item->quality = $item->quality + 1;
        }
    }
}
