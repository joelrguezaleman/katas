<?php

namespace Katas\GildedRose\PHP\QualityUpdaters;

use Katas\GildedRose\PHP\Item;

interface QualityUpdaterInterface
{
    public function updateQuality(Item $item);
}
