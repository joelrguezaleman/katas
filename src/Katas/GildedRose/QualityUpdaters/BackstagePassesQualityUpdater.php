<?php

namespace Katas\GildedRose\QualityUpdaters;

use Katas\GildedRose\Item;
use Katas\GildedRose\QualityUpdaters\QualityUpdaterInterface;

class BackstagePassesQualityUpdater implements QualityUpdaterInterface
{
    public function updateQuality(Item $item)
    {
        $this->increaseQuality($item);
        
        if ($item->sellIn < 11) {
            $this->increaseQuality($item);
        }
        if ($item->sellIn < 6) {
            $this->increaseQuality($item);
        }

        $item->sellIn--;

        if ($item->sellIn < 0) {
            $item->quality = 0;
        }
    }

    private function increaseQuality(Item $item)
    {
        if ($item->quality < 50) {
            $item->quality++;
        }
    }
}
