<?php

namespace Katas\GildedRose\PHP;

use Katas\GildedRose\PHP\QualityUpdaters\AgedBrieQualityUpdater;
use Katas\GildedRose\PHP\QualityUpdaters\BackstagePassesQualityUpdater;
use Katas\GildedRose\PHP\QualityUpdaters\GenericQualityUpdater;
use Katas\GildedRose\PHP\QualityUpdaters\SulfurasQualityUpdater;
use PHPUnit\Framework\TestCase;

class QualityUpdaterFactoryTest extends TestCase
{
    /**
     * @dataProvider qualityUpdaterProvider
     */
    public function testItReturnsTheCorrectQualityUpdater(
        string $itemName,
        string $expectedResult
    ) {
        $result = QualityUpdaterFactory::build($itemName);

        self::assertInstanceOf($expectedResult, $result);
    }

    public function qualityUpdaterProvider()
    {
        return [
            [
                '+5 Dexterity Vest',
                GenericQualityUpdater::class
            ],
            [
                'Aged Brie',
                AgedBrieQualityUpdater::class
            ],
            [
                'Backstage passes to a TAFKAL80ETC concert',
                BackstagePassesQualityUpdater::class
            ],
            [
                'Conjured Mana Cake',
                GenericQualityUpdater::class
            ],
            [
                'Elixir of the Mongoose',
                GenericQualityUpdater::class
            ],
            [
                'Sulfuras, Hand of Ragnaros',
                SulfurasQualityUpdater::class
            ],
        ];
    }
}
