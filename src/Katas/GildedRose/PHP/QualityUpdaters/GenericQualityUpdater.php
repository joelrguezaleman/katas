<?php

namespace Katas\GildedRose\PHP\QualityUpdaters;

use Katas\GildedRose\PHP\Item;

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
