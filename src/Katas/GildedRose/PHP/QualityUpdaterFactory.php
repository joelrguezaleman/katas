<?php

namespace Katas\GildedRose\PHP;

use Katas\GildedRose\PHP\QualityUpdaters\AgedBrieQualityUpdater;
use Katas\GildedRose\PHP\QualityUpdaters\GenericQualityUpdater;
use Katas\GildedRose\PHP\QualityUpdaters\QualityUpdaterInterface;

class QualityUpdaterFactory
{
    const INCREMENT = 1;

    public static function build(string $itemName): QualityUpdaterInterface
    {
        switch ($itemName) {
            case 'Aged Brie':
                return new AgedBrieQualityUpdater();
            case 'Backstage passes to a TAFKAL80ETC concert':
                return new BackstagePassesQualityUpdater();
            case 'Conjured Mana Cake':
                return new GenericQualityUpdater(self::INCREMENT * 2);
            case 'Sulfuras, Hand of Ragnaros':
                return new SulfurasQualityUpdater();
            default:
                return new GenericQualityUpdater(self::INCREMENT);
        }
    }
}
