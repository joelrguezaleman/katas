<?php

namespace Katas\GildedRose\QualityUpdaters;

use Katas\GildedRose\Item;

interface QualityUpdaterInterface
{
    public function updateQuality(Item $item);
}
