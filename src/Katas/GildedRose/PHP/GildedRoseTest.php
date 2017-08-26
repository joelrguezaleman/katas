<?php

namespace Katas\GildedRose\PHP;

use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    private $gildedRose;

    public function setUp()
    {
        $items = [
            '5DV1' => new Item('+5 Dexterity Vest', 10, 20),
        ];
        $this->gildedRose = new GildedRose($items);

        $this->gildedRose->updateQuality();
    }

    public function testAnItemCanBeRetrieved()
    {
        $dexterityVest = $this->gildedRose->getItem('5DV1');
        self::assertInstanceOf(Item::class, $dexterityVest);
    }

    public function testAnErrorIsThrownIfTheItemKeyIsUnknown()
    {
        self::assertFalse($this->gildedRose->getItem('unknown key'));
    }
}
