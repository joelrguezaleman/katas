<?php

namespace Katas\GildedRose\PHP;

class QualityUpdaterFactory
{
    public static function build(string $itemName): QualityUpdaterInterface
    {
        switch ($itemName) {
            case 'Aged Brie':
                return new AgedBrieQualityUpdater();
            case 'Backstage passes to a TAFKAL80ETC concert':
                return new BackstagePassesQualityUpdater();
            case 'Conjured Mana Cake':
                return new ConjuredManaCakeQualityUpdater();
            case 'Sulfuras, Hand of Ragnaros':
                return new SulfurasQualityUpdater();
            default:
                return new GenericQualityUpdater();
        }
    }
}
