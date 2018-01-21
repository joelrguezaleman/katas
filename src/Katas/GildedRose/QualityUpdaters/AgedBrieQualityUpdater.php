<?php

namespace Katas\GildedRose\QualityUpdaters;

use Katas\GildedRose\Item;
use Katas\GildedRose\QualityUpdaters\QualityUpdaterInterface;

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
