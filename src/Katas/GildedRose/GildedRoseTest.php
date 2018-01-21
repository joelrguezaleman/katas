<?php

namespace Katas\GildedRose;

use Exception;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    public function testAnItemCanBeRetrieved()
    {
        $gildedRose = new GildedRose(['sku' => new Item('+5 Dexterity Vest', 1, 3)]);

        $gildedRose->updateQuality();

        $dexterityVest = $gildedRose->getItem('sku');
        self::assertInstanceOf(Item::class, $dexterityVest);
    }

    public function testFalseIsReturnedIfTheItemKeyIsUnknown()
    {
        $gildedRose = new GildedRose([]);

        $gildedRose->updateQuality();

        self::assertFalse($gildedRose->getItem('sku'));
    }

    /**
     * @dataProvider itemsProvider
     */
    public function testItemsQualityIsDegradedCorrectly(array $items, string $result)
    {
        $gildedRose = new GildedRose($items);

        $gildedRose->updateQuality();

        $item = $gildedRose->getItem('sku');
        self::assertEquals($result, $item->__toString());
    }

    public function itemsProvider(): array
    {
        return [

            // At the end of each day our system lowers both values for every item
            [
                ['sku' => new Item('+5 Dexterity Vest', 3, 3)],
                '+5 Dexterity Vest, 2, 2'
            ],

            // Once the sell by date has passed, Quality degrades twice as fast
            [
                ['sku' => new Item('+5 Dexterity Vest', 0, 3)],
                '+5 Dexterity Vest, -1, 1'
            ],

            // The Quality of an item is never negative
            [
                ['sku' => new Item('+5 Dexterity Vest', 0, 0)],
                '+5 Dexterity Vest, -1, 0'
            ],

            // "Aged Brie" actually increases in Quality the older it gets
            [
                ['sku' => new Item('Aged Brie', 2, 2)],
                'Aged Brie, 1, 3'
            ],

            // The Quality of an item is never more than 50
            [
                ['sku' => new Item('Aged Brie', 2, 50)],
                'Aged Brie, 1, 50'
            ],

            // "Sulfuras", being a legendary item, never has to be sold or decreases in Quality
            [
                ['sku' => new Item('Sulfuras, Hand of Ragnaros', 2, 80)],
                'Sulfuras, Hand of Ragnaros, 2, 80'
            ],

            // "Backstage passes" quality is set correctly in all cases
            [
                ['sku' => new Item('Backstage passes to a TAFKAL80ETC concert', 11, 10)],
                'Backstage passes to a TAFKAL80ETC concert, 10, 11'
            ],
            [
                ['sku' => new Item('Backstage passes to a TAFKAL80ETC concert', 10, 10)],
                'Backstage passes to a TAFKAL80ETC concert, 9, 12'
            ],
            [
                ['sku' => new Item('Backstage passes to a TAFKAL80ETC concert', 9, 10)],
                'Backstage passes to a TAFKAL80ETC concert, 8, 12'
            ],
            [
                ['sku' => new Item('Backstage passes to a TAFKAL80ETC concert', 8, 10)],
                'Backstage passes to a TAFKAL80ETC concert, 7, 12'
            ],
            [
                ['sku' => new Item('Backstage passes to a TAFKAL80ETC concert', 7, 10)],
                'Backstage passes to a TAFKAL80ETC concert, 6, 12'
            ],
            [
                ['sku' => new Item('Backstage passes to a TAFKAL80ETC concert', 6, 10)],
                'Backstage passes to a TAFKAL80ETC concert, 5, 12'
            ],
            [
                ['sku' => new Item('Backstage passes to a TAFKAL80ETC concert', 5, 10)],
                'Backstage passes to a TAFKAL80ETC concert, 4, 13'
            ],
            [
                ['sku' => new Item('Backstage passes to a TAFKAL80ETC concert', 4, 10)],
                'Backstage passes to a TAFKAL80ETC concert, 3, 13'
            ],
            [
                ['sku' => new Item('Backstage passes to a TAFKAL80ETC concert', 3, 10)],
                'Backstage passes to a TAFKAL80ETC concert, 2, 13'
            ],
            [
                ['sku' => new Item('Backstage passes to a TAFKAL80ETC concert', 2, 10)],
                'Backstage passes to a TAFKAL80ETC concert, 1, 13'
            ],
            [
                ['sku' => new Item('Backstage passes to a TAFKAL80ETC concert', 1, 10)],
                'Backstage passes to a TAFKAL80ETC concert, 0, 13'
            ],
            [
                ['sku' => new Item('Backstage passes to a TAFKAL80ETC concert', 0, 10)],
                'Backstage passes to a TAFKAL80ETC concert, -1, 0'
            ],

            //  "Conjured" items degrade in Quality twice as fast as normal items
            [
                ['sku' => new Item('Conjured Mana Cake', 3, 6)],
                'Conjured Mana Cake, 2, 4'
            ],
            [
                ['sku' => new Item('Conjured Mana Cake', 0, 6)],
                'Conjured Mana Cake, -1, 2'
            ],
            [
                ['sku' => new Item('Conjured Mana Cake', 0, 1)],
                'Conjured Mana Cake, -1, 0'
            ],
        ];
    }

    /**
     * @dataProvider badItemsProvider
     */
    public function testItThrowsAnExceptionIfTheBusinessRulesAreViolated(
        array $items,
        string $exceptionMessage
    ) {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage($exceptionMessage);

        $gildedRose = new GildedRose($items);

        $gildedRose->updateQuality();
    }

    public function badItemsProvider(): array
    {
        return [
            [
                ['sku' => new Item('Sulfuras, Hand of Ragnaros', 10, -1)],
                'An item quality can never be negative'
            ],
            [
                ['sku' => new Item('+5 Dexterity Vest', 10, 51)],
                'An item quality can not be higher than 50'
            ],
            [
                ['sku' => new Item('Sulfuras, Hand of Ragnaros', 10, 79)],
                'The quality of the item "Sulfuras" must be 80'
            ],
        ];
    }
}
