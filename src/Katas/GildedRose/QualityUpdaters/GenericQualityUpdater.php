<?php

namespace Katas\GildedRose\QualityUpdaters;

use Katas\GildedRose\Item;

class GenericQualityUpdater extends AbstractQualityUpdater
{
    public function updateQuality(Item $item)
    {
        $item->sellIn--;

        $increment = $this->increment();
        $item->quality -= $item->sellIn < 0 ? $increment * 2 : $increment;

        if ($item->quality < 0) {
            $item->quality = 0;
        }
    }
}
