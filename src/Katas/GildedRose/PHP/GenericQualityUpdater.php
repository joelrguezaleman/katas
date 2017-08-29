<?php

namespace Katas\GildedRose\PHP;

class GenericQualityUpdater extends AbstractQualityUpdater
{
    public function updateQuality(Item $item)
    {
        $item->sellIn--;

        $increment = $this->increment();
        $qualityDecrease = $item->sellIn < 0 ? $increment * 2 : $increment;
        $item->quality -= $qualityDecrease;

        if ($item->quality < 0) {
            $item->quality = 0;
        }
    }
}
